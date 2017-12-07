<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
//use Mail;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            //'confirm_password' => 'same:password',
            'phone' => 'required|numeric|min:6',
            'organization' => 'string|min:3',
            'address ' => 'string|min:6',
            'profile_pic ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $confirmation_code = str_random(30);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
<<<<<<< HEAD
			'phone' => $data['phone'],
			'organization' => $data['organization'],
			'address' => $data['address'],
			'profile_pic' => $data['profile_pic'],
			/*'created_at'=>date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),*/
			//'updated_at'=>$data['updated_at'],
			'active'=>0,
            'confirmation_code' => $confirmation_code,
            'confirmed' => 0

			
        ]);
    }

    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Flash::message('You have successfully verified your account.');

        return Redirect::route('login_path');
    }
	
	
	public function postRegister(Request $request)
   {
       $validator = $this->validator($request->all());

       if ($validator->fails()) {
           $this->throwValidationException(
               $request, $validator
           );
       }
       //adding confirmation code part
     /*  Mail::send('email.verify', $confirmation_code, function($message) {
           $message->to(Input::get('email'), Input::get('name'))
               ->subject('Verify your email address');
       });*/

       //Flash::message('Thanks for signing up with us! Please check your email.');


       $this->create($request->all());
	

       return redirect($this->redirectPath());
   }
=======
            'phone' => $data['phone'],
            'organization' => $data['organization'],
            'address' => $data['address'],
            'profile_pic' => $data['profile_pic'],
            /*'created_at'=>date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),*/
            //'updated_at'=>$data['updated_at'],
            'active' => 0,

        ]);
    }


    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->create($request->all());
        return redirect($this->redirectPath());
    }
>>>>>>> master
}
