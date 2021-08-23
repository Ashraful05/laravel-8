<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function changePassword(){
        return view('admin.password.change-password');
    }
    public function updatePassword(Request $request){
        $this->validate($request,[
           'current_password' => 'required',
           'password' => 'required',
           'confirm_password' => 'required'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password,$hashedPassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('message','Now Login with new password');
        }else{
            return redirect()->back()->with('message','current password is invalid');
        }
    }
    public function profileUpdate(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.profile.update-profile',compact('user'));
            }

        }
    }
    public function updateUserProfile(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();
            return redirect()->back()->with('message','Profile Info Updated');
        }else{

        }
    }
}
