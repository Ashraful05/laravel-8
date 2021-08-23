<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class HomeController extends Controller
{
    public function homeSlider(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function addSlider(){
        return view('admin.slider.add-slider');
    }
    public function saveSlider(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|mimes:jpg,png',
        ]);
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider_image = $request->file('image');
        $name_generate = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_generate);
        $final_image = 'image/slider/'.$name_generate;
        $slider->image = $final_image;
        $slider->save();
        return redirect()->route('home-slider')->with('message','Slider Info saved successfully');

    }
}
