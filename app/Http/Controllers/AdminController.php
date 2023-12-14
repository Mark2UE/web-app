<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        // $data = User::all();
        // , ['users' => $data]--include to view();

        return view('admin.admin');
    }


    public function login(Request $request)
    {
        $validatedData = $request->validate([
            "username" => ['required'],
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $validatedData['username'])->first();

        if (!$admin) {
            // User not found or invalid password
            return redirect()->route('home')->with('message', 'Invalid credentials.');
        } else {
            $request->session()->regenerate();

            // Authenticate the user using Laravel's built-in Auth::login method
            // Auth::login($request, true);

            return redirect()->route('home')->with('adminconfirm', 'Welcome, ' . $admin->username . '!');
        }
    }

    public function show()
    {

        $interaction = DB::table('comments')
            ->select('comment')
            ->count();
        $users = DB::table('users')
            ->select('users')
            ->count();
        $posts = DB::table('posts')
            ->select('posts')
            ->count();


        return view('admin.dashboard', [
            'comments' => $interaction,
            'users' => $users,
            'posts' => $posts,
        ]);
    }

    public function show_users()
    {
        $data = User::all();
        return view('admin.users', ['users' => $data]);
    }

    public function update_user($id)
    {
        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', $id)
            ->first();




        return view('admin.users-update', ['userdata' => $user]);
    }

    public function delete_user($id)
    {
        $matchingRowsTable1 = User::where('id', $id)->get();
        foreach ($matchingRowsTable1 as $row) {
            $row->delete();
        }

        return back()->with('messagegreen', 'User has been Deleted');
    }

    public  function show_post()
    {
        $data = Post::all();
        return view('admin.post', ['users' => $data]);
    }

    public  function show_post_update($id)
    {
        $user = DB::table('posts')
            ->select('*')
            ->where('id', '=', $id)
            ->first();




        return view('admin.post-update', ['post' => $user]);
    }


    public function update_post(Request $request)
    {
        $post = Post::find($request->id);

        $post->update([
            'title' => $request->title,
            'body' => $request->Body,
        ]);
        return back()->with('messagegreen', 'Post has been Updated.');
    }


    public function delete_post($id)
    {
        $matchingRowsTable1 = Post::where('id', $id)->get();
        foreach ($matchingRowsTable1 as $row) {
            $row->delete();
        }

        return back()->with('messagegreen', 'Post has been Deleted');
    }
}
