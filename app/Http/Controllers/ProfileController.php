<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    private $username;
    public function __construct(Request $request){

        $this->username = $request->username;

    }

    public function index(){
        $users = User::all();
        return view('profile.index')->with('users', $users);
    }
    public function show(){

        $user = User::where('username', '=', $this->username)->first();
        return view('profile.show')->with('user', $user);
    }
}
