<?php
namespace App\SMS;
use Nexmo;

final class SMS {
	public function sentSMS ($data=[]) {
		try{
	        $send = Nexmo::message()->send([
                'to'   => $data['to'],
                'from' => $data['from'],
                'text' => $data['text']
            ]);
            if($send){
            	return true;
            }
	    }catch(\Exception $e){
	        return response()->json(['code'=>500,'message'=>'error', 'error_details'=>$e]);
	    }
	}
}
?>