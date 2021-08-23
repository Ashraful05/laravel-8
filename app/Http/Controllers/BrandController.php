<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultipleImage;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allBrand(){
        $brands = Brand::latest()->paginate(8);
        return view('admin.brand.all-brand',compact('brands'));
    }
    public function saveBrand(Request $request){
        $this->validate($request,[
            'brand_name' => 'required',
            'brand_image' => 'required|mimes:jpg,png',
        ]);
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;

        $brand_image = $request->file('brand_image');

//        $name_generate = hexdec(uniqid());
//        $image_extension = strtolower($brand_image->getClientOriginalExtension());
//        $image_name = $name_generate.'.'.$image_extension;
//        $location = 'image/brand/';
//        $last_image = $location.$image_name;
//        $brand_image->move($location,$image_name);
//        $brand->brand_image = $last_image;

        $name_generate = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_generate);
        $final_image = 'image/brand/'.$name_generate;
        $brand->brand_image = $final_image;

        $brand->save();

        $notification = array(
            'message' => 'Brand Info saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editBrand($id){
        $editBrand = Brand::find($id);
        return view('admin.brand.edit-brand',compact('editBrand'));
    }
    public function updateBrand(Request $request,$id){
        $brand = Brand::find($request->id);
        $brand->brand_name = $request->brand_name;

        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');
        if($brand_image){
            $name_generate = hexdec(uniqid());
            $image_extension = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $name_generate.'.'.$image_extension;
            $location = 'image/brand/';
            $last_image = $location.$image_name;
            $brand_image->move($location,$image_name);
            unlink($old_image);
            $brand->brand_image = $last_image;
            $brand->update();
            $notification = array(
                'message' => 'Brand Info Updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all-brand')->with($notification);
        }else{
            $brand->brand_name = $request->brand_name;
            $brand->update();
            $notification = array(
                'message' => 'Brand Info Updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all-brand')->with($notification);
        }


    }
    public function deleteBrand($id){
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
//        unlink($old_image);
        $brand->delete();
        $notification = array(
            'message' => 'Brand Info Updated successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function multiImage(){
        $images = MultipleImage::all();
        return view('admin.multiimage.image',compact('images'));
    }
    public function saveMultipleImage(Request $request){
//        $this->validate($request,[
//            'image' => 'required|mimes:jpeg,jpg,png',
//        ]);

//        $multiple_image = new MultipleImage();
//        $multiple_image->image = $request->file('image');
////        dd($multiple_image);
//        foreach ($multiple_image as $image){
//            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
//            Image::make($image)->resize(300,200)->save('image/multi-image/'.$name_generate);
//            $final_image = 'image/multi-image/'.$name_generate;
//            $image->image = $final_image;
//            $image->save();
//        }

        $image = $request->file('image');
        foreach ($image as $multiple_image){
            $name_generate = hexdec(uniqid()).'.'.$multiple_image->getClientOriginalExtension();
//            dd($name_generate);
            Image::make($multiple_image)->resize(300,200)->save('image/multi-image/'.$name_generate);
            $final_image = 'image/multi-image/'.$name_generate;
            MultipleImage::insert([
               'image' => $final_image,
                'created_at' => Carbon::now()
            ]);
        }
        return redirect()->back()->with('message','Multiple Image saved successfully');
    }
}
