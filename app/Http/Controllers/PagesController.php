<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.welcome');
        //process variable data or params
        //talk to the model
        //receive from the model
        //compile or process data from the model if needed
        //pass that data to the correct view
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
