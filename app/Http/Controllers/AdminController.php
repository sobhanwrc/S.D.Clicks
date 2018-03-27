<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use App\Email\Email;
use Nexmo;
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{
    public function __construct (){
        $this->admin_email_send = New Email();
    }

    public function index () {
    	return view ('backend.login');
    }

    public function login (Request $request) {
    	Validator::make($request->all(),[
    		'email' => 'required',
    		'password' => 'required'
    	],[
    		'email.required' => "Enter your email.",
    		'password.required' => "Enter your password."
    	])->validate();

    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            $data = [
                'email' => $request->email,
                'ip' => $request->ip()
            ];
            $email = "sobhandas30@gmail.com";

            $mail = $this->admin_email_send->sendEmail($email,$data);

            $send = Nexmo::message()->send([
                'to'   => '917890379068',
                'from' => '917278088825',
                'text' => 'Hey! Admin , Someone successfully login with email id '. $request->email .'and from IP is '. $request->ip().''
            ]);

            if($mail && $send){
                return redirect('/admin/dashboard');                
            }else{
                $request->session()->flash("login-failed", "Email or Password is wrong.");
                return redirect('/admin');
            }
            
        }else{
            $request->session()->flash("login-failed", "Email or Password is wrong.");
            return redirect('/admin');
        }
    }

    public function social_login ($service) {
        //source file is https://medium.com/justlaravel/laravel-social-login-using-socialite-45305c7ddc00

        //for facebook login you have to set the url https.Because facebook has been changed the rull of web login valid oAuth redirect urls. So, First I make virtual host with https.Then change the settings under facebook developre.

        
        return Socialite::driver ( $service )->redirect ();
    }

    public function callback ($service) {
        $user = Socialite::with ( $service )->user ();
        if(!empty($user)){

        }
        echo "<pre>";
        print_r($user);
    }
}
