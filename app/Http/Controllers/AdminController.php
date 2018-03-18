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
                'to'   => '917980149707',
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

    public function fb_login () {

    }

    public function google_login () {
        //source file is https://medium.com/justlaravel/laravel-social-login-using-socialite-45305c7ddc00
    }
}
