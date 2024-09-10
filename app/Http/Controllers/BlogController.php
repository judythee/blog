<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    public function index(){
        // Fetch posts with pagination
        $posts = Post::paginate(10);

        // Return the view and pass in the posts object
        return view('blog.index', compact('posts'));
    }

    public function single($slug)
{
    // Fetch the post from the database based on the slug
    $post = Post::where('slug', $slug)->firstOrFail();

    // Return the view and pass in the post object
    return view('blog.single', compact('post'));
}

}
