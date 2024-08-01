<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posts variable retrieves all posts from the database and passes them to the posts.index view.
        //compact function creates an associative array of all posts, passing multiple posts to the posts.index view in a concise manner.
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required|string'
        ]);

        // Create a new post using the validated data
       
        $post = Post::create($validatedData);

        

        // Redirect to a specific route with a success message
        return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Retrieve the post by id or throw a 404 error if not found
        $post = Post::findOrFail($id);
        //Return the 'posts.show' view the post data
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable
        $post = Post::findOrFail($id);

        //return the view and pass in the created variable
        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Find the post by ID
        $post = Post::findOrFail($id);

        // Update the post with the request data
        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        // Redirect to the show page with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
