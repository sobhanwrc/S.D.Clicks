<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use Image;

class DashboardController extends Controller
{
    public function index () {
    	return view ('backend.dashboard.dashboard');
    }

    public function logout () {
    	Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function profile(Request $request) {
    	$details = User::first()->get()->toArray();
    	return view('backend.profile.profile')->with('details',$details[0]);	
    }

    public function profile_submit (Request $request) {
    	Validator::make($request->all(),[
    		'name' => 'required',
    		'address' => 'required',
    		'fb_id' => 'required',
    		'instagram_id' => 'required',
    		'mobile_no' => 'required',
    		'about_me' => 'required',
            'profile_image' => 'max:500000|mimes:jpeg,png,jpg'
    	],[
    		'name.required' => "Please enter your name.",
    		'address.required' => "Please enter your address.",
    		'fb_id.required' => "Please enter your facebook id.",
    		'instagram_id.required' => "Please enter your instagram id.",
    		'mobile_no.required' => "Please enter your mobile number.",
    		'about_me.required' => "Please enter your details.",
            'profile_image.max' => "Upload within 5MB",
            'profile_image.mimes' => "File type should be jpeg or png or jpg format",
    	])->validate();


        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = time().'_'.$file->getClientOriginalName();
            //thumb destination path
            $destinationPath_2 = public_path().'/storage/admin/upload/profile_image/resize/';
            $img = Image::make($file->getRealPath());
            $img->resize(128, 128, function ($constraint) {
              $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName);
            //original destination path
            $destinationPath = public_path().'/storage/admin/upload/profile_image/original/';
            $file->move($destinationPath,$fileName);
        }
        else {
            $fileName = $request->exiting_profile_image;
        }

    	$edit = User::find(Auth::guard('admin')->user()->id);
        $edit->name = $request->name;
    	$edit->address = $request->address;
    	$edit->fb_id = $request->fb_id;
    	$edit->instagram_id = $request->instagram_id;
    	$edit->mobile_number = $request->mobile_no;
        $edit->about_me = $request->about_me;
    	$edit->profile_image = $fileName;
        if($edit->save()){
        	$request->session()->flash("profile-update", "Profile updated successfully.");
            return redirect('/admin/profile');
        }
    }
}
