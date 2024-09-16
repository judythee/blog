<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class YourController extends Controller
{
    public function postContact(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        );

        Mail::send('view', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('hello@example.com');
            $message->subject($data['subject']);
        });
    }
}

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
    
        $fullname = $first . " " . $last;
        $email = 'me@gmail.com';
        $data = [];
        $data['fullname'] = $fullname;
        $data['email'] = $email;
    
        return view('pages.about', ['data' => $data]);
    }
    

    public function contact()
    {
        return view('pages.contact');  
    }
    public function postcontact(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

    $data = array(
        'email' => $request->email,
        'subject' => $request->subject,
        'bodymessage' => $request->message
    );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('hello@example.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was Sent!');

        return redirect()->to('/');
    }
}