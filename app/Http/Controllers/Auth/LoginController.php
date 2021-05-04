<?php

namespace App\Http\Controllers\Auth;

use Auth;

use Validator;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;

use App\User_login;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/users/details';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginFormUsers(){
        return view('user_login_form');
    }


    function checklogin(Request $request){

        $this->validate($request, [
            'username' => 'required', 
            'password' => 'required',
        ]);

        $user_data = array(
            'username'  => $request->get('username'),
            'password' => $request->get('password'),
            'otp_status' => 1,
            'status' =>1
        );

        
        if(!Auth::attempt($user_data)){
            return redirect('/login')
            ->with('message', 'Ooops!  Something Went Wrong! Please Check Your Login Credentials');
        }

    
        if ( Auth::check() ) {
            return redirect('users/details')
            ->with('message', 'You are successfully logged in!');       
        }
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }

    function WelcomUser()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }




}
