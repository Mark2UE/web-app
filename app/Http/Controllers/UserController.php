<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Hashing;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\View;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Lexer\TokenEmulator\TokenEmulator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $posts = DB::table('users')
            ->select('users.email')
            ->get();
        $users = DB::table('users')
            ->select('users.name')
            ->get();
        $takenusers = $users->pluck('name')->toArray();
        $takenEmails = $posts->pluck('email')->toArray();
        $user_lower = array_map('strtolower', $takenusers);
        $email_lower = array_map('strtolower', $takenEmails);
        return view(
            'welcome',
            [
                'takenEmails' => json_encode($email_lower),
                'takenUsers' => json_encode($user_lower)
            ]

        );
    }

   



    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('messagegreen', 'Logout Successful');
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
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.author', 'posts.created_at', 'users.name', 'users.picture', 'users.email')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        $info = ['message' => "Welcome to /Communnity"];
        return view('zencom.community', [
            'posts' => $posts,
            'nav_bar' => 'community'
        ])->with('messagreen', 'Welcome to /Communnity');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
        return back()->with('messagegreen', 'User has been Updated.');
    }


















    // public function show_form()
    // {
    //     return view('forgot_password');
    // }


    // public function forgot_password(Request $request)
    // {

    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //     ]);
    //     $users = DB::table('users')
    //         ->select('*')
    //         ->where('email', '=', $request['email'])
    //         ->first();
    //     if (!$users) {
    //         return back()->with('message', 'no email found.');
    //     }

    //     $token = Str::random(64);
    //     DB::table('password_resets')->insert([
    //         'email' => $request['email'],
    //         'token' => $token,
    //         'created_at' => Carbon::now()
    //     ]);

    //     mail::send(
    //         'mails.mailer-forgot',
    //         [
    //             'users' => $users,
    //             'token' => $token
    //         ],
    //         function ($message) use ($request) {
    //             $message->to($request['email']);
    //             $message->subject('Forgot Password');
    //         }

    //     );

    //     return redirect()->to(route("show.forgot"))->with("message", "Check your email for Password reset link");
    // }

    // public function password_reset($token)
    // {
    //     $users = DB::table('password_resets')
    //         ->select('*')
    //         ->where('token', '=', $token)
    //         ->first();
    //     if (!$users) {
    //         return back()->with('message', 'Token not found.');
    //     } else {
    //         return back()->with('message', 'Token found can change pass.');
    //     }
    // }
}
