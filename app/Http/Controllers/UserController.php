<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Hashing;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Process and store the data
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Send confirmation or error messages
        if ($user) {
            auth()->login($user);
            return redirect('/')->with('message', 'Registration successful.');
        } else {
            return back()->with('message', 'Registration failed. Please try again.');
        }
    }



    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('messagegreen', 'Logout Successful');
    }

    public function login(Request $request)
    {

        $validatedData = $request->validate([
            "email" => ['required', 'email'],
            'password' => 'required'
        ]);


        if (auth()->attempt($validatedData)) {

            $request->session()->regenerate();
            $user = auth()->user();

            return redirect('/')->with('messagegreen', 'Welcome Back User, ' . auth()->user()->name . '');
        } else {
            return back()->with('message', 'Wrong Email or Pass')->onlyInput('email');
        }
    }


    public function show()
    {
        return view('user');
    }
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userId = Auth::id();
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('message', 'User not found.');
        }

        $uploadedFile = $request->file('picture');
        $imageContent = file_get_contents($uploadedFile->path());

        $user->update([
            'picture' => $imageContent, // Store the file path in the database
            // other user data...
        ]);
        return back()->with('messagegreen', 'User picture updated successfully.');
    }


    public function show_community()
    {

        $posts = DB::table('posts')
            ->join('users', 'posts.author', '=', 'users.email')
            ->where('posts.status', '=', 'Public')
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'users.name', 'users.picture')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        $info = ['message' => "Welcome to /Communnity"];
        return view('zencom.community', [
            'posts' => $posts
        ])->with('messagreen', 'Welcome to /Communnity');
    }
}
