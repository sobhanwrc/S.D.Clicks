<?php
namespace App\Email;
use Illuminate\Support\Facades\Mail;

final class Email {
	public function sendEmail ($email='',$data=[]) {
		try{
	        Mail::send('backend.email.admin_login_info', $data, function($message) use ($email) {
	            $message->from(env('MAIL_USERNAME'),'S.D.Clicks-Admin');
	            $message->to($email)->subject('Admin Login Info!');           
	        });
	        
	        return 1;

	    }catch(\Exception $e){
	        return response()->json(['code'=>500,'message'=>'error', 'error_details'=>$e]);
	    }
	}
}
?>