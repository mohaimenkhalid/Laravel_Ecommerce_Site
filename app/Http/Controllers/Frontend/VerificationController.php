<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class VerificationController extends Controller
{
    public function verify($token){

    	$user = User::where('remember_token', $token)->first();

    	if (!is_null($user)) {

    		$user->status = 1;
    		$user->remember_token = NULL;
    		$user->save();

    	\Session::flash('message', 'You registration successfully Completed!! Now Login ');
    	return redirect()->route('login');

    	}

    	else{

    	\Session::flash('error', 'Sorry!! Your token is not match!!');
    	return redirect()->route('register');



    	}

    }

}
