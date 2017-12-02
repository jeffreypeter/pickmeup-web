<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->hasRole('moderator')) {
            Log::info('moderator');
            return view('home-admin');
        } else {
            Log::info('guest');
            return view('home-user');
        }

    }
    public function profile() {
        return view('user.profile');
    }
    public function updateProfile($id, Request $request) {
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        Auth::user()->fresh();
        Session::flash('message', 'Successfully updated User Profile!');
        return view('user.profile');
    }
}
