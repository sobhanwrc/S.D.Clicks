<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use App\Email\Email;

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

            if($mail){
                return redirect('/admin/dashboard');
            }
            
        }else{
            $request->session()->flash("login-failed", "Email or Password is wrong.");
            return redirect('/admin');
        }
    }
}
