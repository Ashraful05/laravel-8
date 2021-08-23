<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function allCategory(){
//        $users = User::all();
        $categories = Category::latest()->paginate(2);
        $trachCategory = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.all-category',['categories'=>$categories,'trachCategory'=>$trachCategory]);
    }
    public function saveCategory(Request $request){
        $this->validate($request,[
           'category_name'=>'required'
        ]);
        $category = new Category();
        $category->user_id = Auth::user()->id;
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back()->with('message','Category Info Saved Successfully');
    }
    public function editCategory($id){
        $editCategory = Category::find($id);
        return view('admin.category.edit-category',compact('editCategory'));

    }
    public function updateCategory(Request $request){
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->user_id  = $request->user_id;
        $category->update();
        return redirect()->route('all-category')->with('message','Category Info Updated');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category Info Deleted');
    }
    public function restoreCategory($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('message','Category Info Restored');
    }
    public function permanentDeleteCategory($id){
        $permanentDelete = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('message','Category permanently deleted');
    }
}
