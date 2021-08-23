<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function homeAbout(){
        $homeAbout = HomeAbout::all();
        return view('admin.about.index',['homeAbout'=>$homeAbout]);
    }
    public function addAbout(){
        return view('admin.about.add-about');
    }
    public function saveAbout(Request $request){
        $this->validate($request,[
           'title' => 'required',
        ]);
        $about = new HomeAbout();
        $about->title = $request->title;
        $about->short_description = $request->short_description;
        $about->long_description = $request->long_description;
        $about->save();
        return redirect()->route('home-about')->with('message','About Info saved Successfully');
    }
    public function editAbout($id){
        $editAbout = HomeAbout::find($id);
        return view('admin.about.edit-about',compact('editAbout'));
    }
    public function updateAbout(Request $request){
        $about = HomeAbout::find($request->edit_about);
        $about->title = $request->title;
        $about->short_description = $request->short_description;
        $about->long_description = $request->long_description;
        $about->update();
        return redirect()->route('home-about')->with('message','About Info updated Successfully');
    }
    public function deleteAbout($id){
        $about = HomeAbout::find($id);
        $about->delete();
        return redirect()->back()->with('message','About Info Deleted');
    }

}
