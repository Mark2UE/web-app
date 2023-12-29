<?php

namespace App\Http\Controllers;

use App\Models\Post as PostModel;
use Illuminate\Http\Request;
use Post;
use Illuminate\Support\Facades\DB;
use App\Models\Comment as Commenttopost;
use Comment;




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
        $posts = DB::table('posts')
            ->join('users', 'posts.author', '=', 'users.email')
            ->where('posts.status', '=', 'Public')
            ->where('posts.id', '=', $id)
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.author', 'posts.created_at', 'users.name', 'users.picture', 'users.email')
            ->orderBy('posts.created_at', 'desc')
            ->get(); // Use first() instead of get() to retrieve a single record

        $comment = DB::table('comments')
            ->join('users', 'users.email', '=', 'author')

            ->where('comments.connected_to', '=', $id)
            ->select('comments.commented_to', 'comments.id', 'comments.connected_to', 'comments.comment', 'comments.author', 'comments.created_at', 'users.name', 'users.picture', 'users.email')
            ->orderBy('comments.created_at', 'desc')
            ->get();

        $user = DB::table('posts')
            ->join('users', 'posts.author', '=', 'users.email')
            ->where('posts.status', '=', 'Public')
            ->where('posts.id', '=', $id)
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.author', 'posts.created_at', 'users.name', 'users.picture', 'users.email')
            ->orderBy('posts.created_at', 'desc')
            ->first(); // Use first() instead of get() to retrieve a single record


        return view('zencom.post', [
            'posts' => $posts,
            'comments' => $comment,
            'nav_bar' => 'community',
            'users' => $user,
        ]);
    }


    public function user_profile()
    {
        $post = DB::table('posts')
            ->join('users', 'posts.author', '=', 'users.email')
            ->where('posts.status', '=', 'Public')
            ->where('posts.author', '=', auth()->user()->email)
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.author', 'posts.created_at', 'users.name', 'users.picture', 'users.email')
            ->orderBy('posts.created_at', 'desc')
            ->get(); // Use first() instead of get() to retrieve a single record

        $interaction = DB::table('comments')
            ->select('comment')
            ->where('comments.author', '=', auth()->user()->email)
            ->count();

        $contribute = DB::table('posts')
            ->select('body')
            ->where('author', '=', auth()->user()->email)
            ->count();



        return view(
            'zencom.profile',
            [
                'posts' => $post,
                'interactions' => $interaction,
                'contribute' => $contribute,
                'nav_bar' => 'profile'
            ]


        );
    }


    public function comment(Request $request, $id)
    {

        if (auth()->user()->id == $id) {

            $validatedData = $request->validate([

                'comment' => 'required',
                'connected_to' => 'required',
                'commented_to' => 'required',
            ]);


            $Comment = Commenttopost::create([
                'comment' => $validatedData['comment'],
                'connected_to' => $validatedData['connected_to'],
                'commented_to' => $validatedData['commented_to'],
                'author' => auth()->user()->email,
                'status' => "PUBLIC",

            ]);
            $id = $validatedData['connected_to'];
            if ($Comment) {
                return redirect('/community/view/' . $id . '')->with('messagegreen', 'Your Comment has been posted.');
            } else {
                return back()->with('message', 'Error post.');
            }
        }
    }


    public function delete_post($id)
    {
        $matchingRowsTable1 = PostModel::where('id', $id)->get();
        foreach ($matchingRowsTable1 as $row) {
            $row->delete();
        }
        $matchingRowsTable2 = Commenttopost::where('connected_to', $id)->get();
        foreach ($matchingRowsTable2 as $row) {
            $row->delete();
        }

        return redirect('/community')->with('messagegreen', 'Post and Comment has been deleted.');
    }

    public function view_profile($id)
    {

        if ($id == auth()->user()->email) {
            return redirect('/community/profile');
        } else {

            $user = DB::table('users')
                ->select('*')
                ->where('email', '=', $id)
                ->first();

            $post = DB::table('posts')
                ->join('users', 'posts.author', '=', 'users.email')
                ->where('posts.status', '=', 'Public')
                ->where('posts.author', '=', $id)
                ->select('posts.id', 'posts.title', 'posts.body', 'posts.author', 'posts.created_at', 'users.name', 'users.picture', 'users.email')
                ->orderBy('posts.created_at', 'desc')
                ->get(); // Use first() instead of get() to retrieve a single record

            $interaction = DB::table('comments')
                ->select('comment')
                ->where('comments.author', '=', $id)
                ->count();

            $contribute = DB::table('posts')
                ->select('body')
                ->where('author', '=', $id)
                ->count();



            return view(
                'zencom.users',
                [
                    'posts' => $post,
                    'interactions' => $interaction,
                    'contribute' => $contribute,
                    'user' => $user,
                    'nav_bar' => 'community'

                ]
            );
        }
    }


    public function update(Request $request)
    {
        // dd($request);
        $post = PostModel::find($request->id);

        $post->update([
            'title' => $request->title,
            'body' => $request->Body,
        ]);
        return back()->with('messagegreen', 'Post has been Updated.');
    }
}
