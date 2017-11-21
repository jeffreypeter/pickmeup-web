<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request,$id) {
        Log::info('In::login '.$id);
        // Validate the form data
        $data = $request->json()->all();
        Log::info($data);
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:1'
        ]);

        // Attempt to login
        if(Auth::attempt(['email'=>$data['email'],'passsword'=>$data['password']])) {
            // If successful, redirect
            // redirect()->intended()
        } else {
            // redirect()->back()->withInput($request->only('email','remember'))
        }
        
        // else failed
        return response()->json([
            'status' => 'success'
        ]);
    }
}