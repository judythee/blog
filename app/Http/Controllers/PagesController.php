<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PagesController extends Controller
{
    public function index(){

        // Fetch the latest 4 posts ordered by creation date in descending order
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();

        // Pass the posts to the view
        return view('pages.welcome', compact('posts'));
    }

    public function about(){
        $first = 'Alex';
        $last = 'Curtis';

        $fullname = $first. " ".$last;
        $email = 'me@gmail.com';
        $data = [];
        $data['fullname'] = $fullname;
        $data['email'] = $email;

        return view('pages.about')->withData($data);
    }

    public function contact()
    {
        return view('pages.contact');  
    }
}
