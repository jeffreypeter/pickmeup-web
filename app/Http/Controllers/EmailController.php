<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send(Request $request){
        //Logic will go here
        $title = $request->input('Hello');
        $content = $request->input('Welcome to BISM!');

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('ramya.2jan@gmail.com', 'Ramya Nagarajan');

            $message->to('ramya.2jan@gmail.com');

        });

        return response()->json(['message' => 'Request completed']);
    }
}
