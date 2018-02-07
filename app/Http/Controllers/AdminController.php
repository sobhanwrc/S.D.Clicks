<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

class AdminController extends Controller
{
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
            return redirect('/dashboard');
        }else{
            $request->session()->flash("login-failed", "Email or Password is wrong.");
            return redirect('/admin');
        }
    }
}
