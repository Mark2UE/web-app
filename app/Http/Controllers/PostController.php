<?php

namespace App\Http\Controllers;

use App\Models\Post as PostModel;
use Illuminate\Http\Request;
use Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function post(Request $request, $id)
    {
        if (session('_token') == $id) {

            $validatedData = $request->validate([
                'title' => 'required',
                'Body' => 'required',
            ]);

            // Process and store the data
            $email = auth()->user()->email;
            $post = PostModel::create([
                'title' => $validatedData['title'],
                'body' => $validatedData['Body'],
                'author' => $email,
                'status' => "Public",
            ]);

            if ($post) {
                return back()->with('messagegreen', 'Has been Posted.');
            } else {
                return back()->with('message', 'Error post.');
            }
        } else {
            abort(404);
        }
    }


    public function view($id)
    {
        $post = DB::table('posts')
            ->join('users', 'posts.author', '=', 'users.email')
            ->where('posts.status', '=', 'Public')
            ->where('posts.id', '=', $id)
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'users.name', 'users.picture')
            ->orderBy('posts.created_at', 'desc')
            ->first(); // Use first() instead of get() to retrieve a single record

        return view('zencom.post', ['post' => $post]);
    }


    public function user_profile()
    {
        $post = DB::table('posts')
            ->join('users', 'posts.author', '=', 'users.email')
            ->where('posts.status', '=', 'Public')
            ->where('posts.author', '=', auth()->user()->email)
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'users.name', 'users.picture')
            ->orderBy('posts.created_at', 'desc')
            ->get(); // Use first() instead of get() to retrieve a single record
        return view('zencom.profile', ['posts' => $post]);
    }
}
