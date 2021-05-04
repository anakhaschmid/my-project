<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use DB;

use App\User_login;
use App\User_details;
use App\ShortLink;
use App\linkCount;

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
        $user = Auth::user();

        $shortlink = ShortLink::orderby('id','desc')
                           ->where('user_id',$user->id)
                               ->get();
        $linkCount = ShortLink::orderby('link')
                          ->where('user_id',$user->id)
                                ->get();
        $duplicate = ShortLink::where('status',1)
                                ->where('user_id',$user->id)
        
                                 ->get();
       

        $userdetails=DB::table('user_details')
                    ->where('login_id',$user->id)
                    ->where('status',1)
					->first();
        return view('user.profile', compact('user','userdetails','shortlink','linkCount','duplicate'));
    }

    public function EditProfile()
    {
        $user = Auth::user();

        $userdetails=DB::table('user_details')
                    ->where('login_id',$user->id)
                    ->where('status',1)
					->first();
        return view('user.edit-profile', compact('user','userdetails'));
    }

    public function UpdateProfile(Request $request)
    {
        $user = Auth::user();

        $userdetails = User_details::where('login_id', $user->id)->first();
        $userdetails->email = $request->email;
        $userdetails->dob = $request->dob;
        $userdetails->city = $request->city;
        $update = $userdetails->save();  

        return $this->index();
        
    }
    public function url_copy(Request $request)
    {
        
           $user = Auth::user();
               
           $ShortLink = ShortLink::where('user_id',$user->id)->first();
           $ShortLink->status = 1;
           $copy_link2 = $ShortLink->save();
           return $this->index();
       
           
         //  return $this->index();


    }

}
