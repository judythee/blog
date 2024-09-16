<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request, $post_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|min:5|max:200',
        ]);
    
        // Find the post
        $post = Post::findOrFail($post_id);
    
        // Create and associate the comment with the post
        $comment = new Comment($validatedData);
        $comment->approved = true;
        $post->comments()->save($comment);
    
        // Flash success message
        Session::flash('success', 'Comment was added');
    
        // Redirect back with a success message
        return redirect()->route('blog.single', [$post->slug])->with('success', 'Comment added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
