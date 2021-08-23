<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function userLogout(){
        Auth::logout();
        return redirect()->route('login')->with('message','You have Successfully LoggedOut');
    }
}
