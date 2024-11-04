<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostsController extends Controller
{
    public function index()
    {
        //Join the user table and the post table with the user_id
        $posts = DB::table('posts')
            ->join('user', 'posts.user_id', '=', 'user.id')
            ->select('posts.id as post_id', 'posts.title', 'posts.image', 'posts.text', 'user.id as user_id', 'user.name as user_name')
            ->get();



        return view('home', compact('posts'));
    }

    public function publish(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        //default image value
        $post->image = null;
        // Assign the logged-in user's ID
        $post->user_id = Auth::id();

        // Handle image upload 
        if ($request->hasFile('image')) {
            // Store image as a string (you can choose a better approach like storing it in a storage directory)
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect('/')->with('success', 'Post published successfully!');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit-post', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Find the post by ID
        $post = Post::findOrFail($id);

        // Update the post fields
        $post->title = $request->input('title');
        $post->text = $request->input('text');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        // Save changes to the database
        $post->save();

        return redirect('/')->with('success', 'Post updated successfully!');
    }
}
