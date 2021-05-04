<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Exception;
use App\User_login;
use App\User_details;
use App\ShortLink;

use PHPMailer\PHPMailer\PHPMailer;

class PostController extends Controller
{




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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user_reg_form');   
    }

    public function generateOTP(){
        $otp = mt_rand(1000,9999);
        return $otp;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function check_username_exist (Request $request){
    $email_exists = User_login::where('username',$request->username)->exists();
    //echo $email_exists;
    // echo $request->username;
    if ( $email_exists ) { echo 'false'; } else { echo 'false'; }
    // exit;
}

    public function store(Request $request)
    {


        $postdata = $request->all();

        $otp = $this->generateOTP();

        $postdata['username'] = $request->username;
        $postdata['password'] = bcrypt($request->password);
        $postdata['otp'] = $otp;

        $email = trim(request('email'));

        $newUser = User_login::create($postdata);


        $usersdetail = User_details::create([
            'email' => $request->email,
            'dob' => $request->dob,
            'city' => $request->city,
            'login_id' => $newUser->id
      ]);   

      session(['id'=> $newUser->id]);
      session(['otp' => $otp]);
      

      require '../vendor/autoload.php';													// load Composer's autoloader

			$mail = new PHPMailer(true);                            // Passing `true` enables exceptions

			try {
				// Server settings
	    	$mail->SMTPDebug = 0;                                	// Enable verbose debug output
				$mail->isSMTP();                                     	// Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';												// Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                              	// Enable SMTP authentication
				$mail->Username ='sender@gmail.com';              // SMTP username
				$mail->Password = 'password';              // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				//Recipients
				$mail->setFrom('sender@gmail.com ', 'User Registration');
				$mail->addAddress($email, 'Optional name');	// Add a recipient, Name is optional
				$mail->addReplyTo('sender@gmail.com', 'User Registration');
				$mail->addCC($email);
				$mail->addBCC($email);

				//Attachments (optional)
				// $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

				//Content
				$mail->isHTML(true); 																	// Set email format to HTML
				$mail->Subject = "User Registration - Email Verification";
				$mail->Body    = " Your One Time Passord for User Registration is ".$otp;						// message

				$mail->send();
				// return back()->with('success','Message has been sent!');
			} catch (Exception $e) {
				// return back()->with('error','Message could not be sent.');
			}

        //    return redirect('/signup/otp/'.$newUser->id);
        return redirect('/otp')->with('message', 'OTP has been sent to your email!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function user_reg()
    {
        return view('user_reg_form');   
    }


    public function enter_otp()
    {
        return view('user_otp_form');
    }

    public function login_form()
    {
        return view('user_login_form');
    }

    public function submit_otp(){
        $otp = trim(request('otp'));
        if($otp==''){
            return redirect('/login')->with('message', 'Ooops!  Something Went Wrong!');
        }
        else{
            if($otp == session('otp')){
            $userlogin = User_login::findOrFail(session('id'));
            $userlogin->otp_status = 1;
            $update1 = $userlogin->save();
            
            $usersdetail = User_details::where('login_id', '=', session('id'))->first();
            $usersdetail->status = 1;
            $update2 = $usersdetail->save();

            return redirect('/login')->with('message', 'Registration Successfull!');
            }
            else{
                return redirect('/login')->with('message', 'Ooops!  Something Went Wrong!');
            }
        }
    }

    public function urlshorten(Request $request)
    {

        $input['title'] = $request->title;
        $input['link'] = $request->link;
        $input['code'] = str_random(6);
        $input['user_id'] = session('id');
              
        ShortLink::create($input);
       
        $shortLinks = ShortLink::where('user_id',$input['user_id'])
                                       ->latest()->get();
        return $shortLinks;

    }



}
