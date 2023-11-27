<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            //dd($user);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }


        // Check if the user with this email already exists in your database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser, true);

            return redirect('/')->with('message', 'You have already an account');
        } else {


            $imageContent = file_get_contents($user->avatar);


            $noSpacesString = preg_replace('/\s+/', '',  $user['given_name']);
            $newUser = User::create([
                'name' => $noSpacesString,
                'email' => $user->email,
                'picture' => $imageContent,
                'password' => bcrypt(Str::random(16)), // You might want to generate a random password for external logins
                // Add any other fields you need for your User model
            ]);

            // Log in the newly created user
            Auth::login($newUser, true);
        }

        // At this point, the user is authenticated in your application

        // Redirect to the home page or wherever you want
        return redirect('/home')->with('messagegreen', 'Registration successful using Google');
    }


    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {

        try {
            $user = Socialite::driver('github')->user();
            // dd($user);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        // Check if the user with this email already exists in your database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser, true);

            return redirect('/')->with('message', 'You have already an account');
        } else {


            $imageContent = file_get_contents($user->avatar);
            $noSpacesString = preg_replace('/\s+/', '',  $user->nickname);

            $newUser = User::create([
                'name' => $noSpacesString,
                'email' => $user->email,
                'picture' => $imageContent,
                'password' => bcrypt(Str::random(16)), // You might want to generate a random password for external logins
                // Add any other fields you need for your User model
            ]);

            // Log in the newly created user
            Auth::login($newUser, true);
        }

        // At this point, the user is authenticated in your application

        // Redirect to the home page or wherever you want
        return redirect('/home')->with('messagegreen', 'Registration successful using Github');
    }
}
