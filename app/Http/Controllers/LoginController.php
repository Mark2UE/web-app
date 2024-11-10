<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use finfo;
use Illuminate\Support\Facades\Storage;
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



        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {

            Auth::login($existingUser, true);

            return redirect('/')->with('message', 'You have already an account');
        } else {

            //$imageData = file_get_contents($user->avatar);
            //$image = file_get_contents($user->avatar);
                 // Retrieve the avatar URL from the user object
            $avatarUrl = $user->avatar;

    // Fetch the avatar image and save it to a temporary file
        $img = file_get_contents($avatarUrl);
        $string = unpack("H*hex",$img);
        $string = '0X'.$string['hex'];



            $noSpacesString = preg_replace('/\s+/', '',  $user['given_name']);
            $newUser = User::create([
                'name' => $noSpacesString,
                'email' => $user->email,
                'password' => bcrypt(Str::random(16)),
                'picture' => $user_pic = DB::raw("CONVERT(VARBINARY(MAX), $string)") , // You might want to generate a random password for external logins
               // Add any other fields you need for your User model
            ]);
            Auth::login($newUser, true);

            // dd($user->avatar);
            // $imageData = file_get_contents($user->avatar);

            // $noSpacesString = preg_replace('/\s+/', '', $user['given_name']);
            // if (is_resource($imageData)) { // Check if resource (file handle)
            //     $finfo = new finfo(FILEINFO_MIME_TYPE);
            //     $mimeType = $finfo->file($user->avatar);

            //     $binaryData = fread($mimeType,filesize($user->avatar));
            //     fclose($mimeType); // Close the file handle
            //   } else {
            //     // Handle potential errors (e.g., file not found)
            //     throw new Exception("Failed to read avatar content");
            //   }
            // // Choose either PDO or raw SQL approach (comment out the other)

            // // PDO approach (recommended)
            // $sql = "INSERT INTO users (name, email, password, picture, mime_type)
            //         VALUES (:name, :email, :password, :binaryData, :mimeType)";

            // $params = [
            //   ':name' => $noSpacesString,
            //   ':email' => $user->email,
            //   ':password' => bcrypt(Str::random(16)),
            //   ':binaryData' => $binaryData,
            //   ':mimeType' => $mimeType,
            // ];

            // DB::connection('sqlsrv')->insert($sql, $params);

            // Raw SQL approach (alternative)
            /*
            $sql = "INSERT INTO your_table (name, email, password, picture)
                    VALUES (:name, :email, :password, CONVERT(varbinary(max), ?))";

            $params = [
              ':name' => $noSpacesString,
              ':email' => $user->email,
              ':password' => bcrypt(Str::random(16)),
              $binaryData, // Binary data as direct parameter
            ];

            DB::connection('sqlsrv')->insert($sql, $params);
            */

            // $newUser = User::create([
            //   'name' => $noSpacesString,
            //   'email' => $user->email,
            //   'password' => bcrypt(Str::random(16)),
            // ]);

            // Auth::login($newUser, true);















                // Retrieve the image content from the Google API


                // $response = Http::get($user->avatar);
                // if ($response->successful()) {
                //     $imageContent = $response->body();

                //     // Convert the binary image data to base64 encoding
                //     $base64Image = base64_encode($imageContent);

                //     // Store the base64 encoded image data in the database
                //     try {
                //         $noSpacesString = preg_replace('/\s+/', '', $user['given_name']);
                //         $newUser = User::create([
                //             'name' => $noSpacesString,
                //             'email' => $user->email,
                //             'picture' => DB::raw('CONVERT(VARBINARY(MAX), ?)', [$base64Image]),
                //             'password' => bcrypt(Str::random(16)), // You might want to generate a random password for external logins
                //             // Add any other fields you need for your User model
                //         ]);

                //         Auth::login($newUser, true);
                //     } catch (\Exception $e) {
                //         // Handle database errors
                //     dd($e);
                //     }
                // } else {
                //     dd($response);
                // }







        }


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


        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {

            Auth::login($existingUser, true);

            return redirect('/')->with('message', 'You have already an account');
        } else {


            $imageContent = $user->avatar;
            $img = file_get_contents($imageContent);
            $string = unpack("H*hex",$img);
            $string = '0X'.$string['hex'];
            $noSpacesString = preg_replace('/\s+/', '',  $user->nickname);

            $newUser = User::create([
                'name' => $noSpacesString,
                'email' => $user->email,
                'picture' => $user_pic = DB::raw("CONVERT(VARBINARY(MAX), $string)"),
                'password' => bcrypt(Str::random(16)),

            ]);


            Auth::login($newUser, true);
        }

        // At this point, the user is authenticated in your application

        // Redirect to the home page or wherever you want
        return redirect('/home')->with('messagegreen', 'Registration successful using Github');
    }



    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function handleFacebookCallback()
    // {
    //     try {
    //         $user = Socialite::driver('facebook')->user();
    //         dd($user);
    //     } catch (\Exception $e) {
    //         dd($e->getMessage());
    //     }

    //     // Check if the user with this email already exists in your database
    //     $existingUser = User::where('email', $user->email)->first();

    //     if ($existingUser) {
    //         // Log in the existing user
    //         Auth::login($existingUser, true);

    //         return redirect('/')->with('message', 'You have already an account');
    //     } else {


    //         $imageContent = file_get_contents($user->avatar);
    //         $noSpacesString = preg_replace('/\s+/', '',  $user->nickname);

    //         $newUser = User::create([
    //             'name' => $noSpacesString,
    //             'email' => $user->email,
    //             'picture' => $imageContent,
    //             'password' => bcrypt(Str::random(16)), // You might want to generate a random password for external logins
    //             // Add any other fields you need for your User model
    //         ]);

    //         // Log in the newly created user
    //         Auth::login($newUser, true);
    //     }

    //     // At this point, the user is authenticated in your application

    //     // Redirect to the home page or wherever you want
    //     return redirect('/home')->with('messagegreen', 'Registration successful using Facebook');
    // }\\



    private function isValidImage($filePath)
{
    // Validate the image file here
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $maxFileSize = 2048; // Adjust max file size as needed

    $fileMimeType = mime_content_type($filePath);
    $fileSize = filesize($filePath);

    return in_array($fileMimeType, $allowedMimeTypes) && $fileSize <= $maxFileSize;
}
}
