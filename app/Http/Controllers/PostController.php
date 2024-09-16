<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        //$posts variable retrieves all posts from the database and passes them to the posts.index view.
        //compact function creates an associative array of all posts, passing multiple posts to the posts.index view in a concise manner.
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();
    $tags = Tag::all();
    return view('posts.create', compact('categories', 'tags'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required',   
        ]);

        // Create a new post using the validated data

            $post = Post::create($validatedData);
            $post->tags()->sync($request->tags, false);


        // Redirect to a specific route with a success message
        return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Retrieve the post by id or throw a 404 error if not found
        $post = Post::with('category')->findOrFail($id);
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
        $categories = Category::pluck('name', 'id');

    // Return the view and pass in the created variable
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Find the post by ID
    $post = Post::findOrFail($id);

    // Determine validation rules
    $rules = [
        'title' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'body' => 'required|string',
    ];

    // If the submitted slug is different from the current slug, add slug validation
    if ($request->input('slug') !== $post->slug) {
        $rules['slug'] = 'required|alpha_dash|min:5|max:255|unique:posts,slug';
    }

    // Validate the request data
    $request->validate($rules);

    // Update the post with the request data
    $post->update([
        'title' => $request->input('title'),
        'slug' => $request->input('slug'),
        'category_id' => $request->input('category_id'),
        'body' => $request->input('body'),
    ]);

    // Redirect to the show page with a success message
    return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Delete the post
        $post->delete();

        // Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
