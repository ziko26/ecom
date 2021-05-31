<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\ActivateYourAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{
    //activate the user account
    public function activateUserAccount($code){
        $user = User::whereCode($code)->first();
        $user->code = null;
        $user->update([ "active" => 1 ]);
        Auth::login($user);
        return redirect('/')->withSuccess('Connect successflly');
    }

     //send email to activate the user account
     public function resendActivationCode($email){
        $user = User::whereEmail($email)->first();
        if($user->active){
            return redirect('/');
        }
        Mail::to($user)->send(new ActivateYourAccount($user->code));
        return redirect('/login')->withSuccess('The link to activate was sent to your email.');
    }


}
