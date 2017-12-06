<?php


	
	namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use Auth;
    use AuthenticatesUsers;
	
	

class LoginController extends BaseController
{
    public function login(Request $req)
	{
		
		$email=$req->input('email');
		$password=$req->input('password');
		
	  
	  if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect('/');
        }
		else
      {
          return redirect('/login');
      }
     }
	 
	 
	 public function logout(Request $request) {
  Auth::logout();
  return redirect('/login');
}



/**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
	
?>
