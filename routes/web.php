<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Brand;
use App\Models\MultipleImage;
use App\Models\HomeAbout;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortFolioController;
use App\Http\Controllers\Contactcontroller;
use App\Http\Controllers\ChangePassword;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $brands = Brand::all();
    $about = HomeAbout::first();
    $images = MultipleImage::all();
    return view('frontend.home.home',compact('brands','about','images'));
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.home');
})->name('dashboard');

//user logout
Route::get('/user/logout',[UserController::class,'userLogout'])->name('user-logout');
//Category Controller..........
Route::get('all/category',[CategoryController::class,'allCategory'])->name('all-category');
Route::post('save/category',[CategoryController::class,'saveCategory'])->name('save-category');
Route::get('edit/category/{id}',[CategoryController::class,'editCategory'])->name('edit-category');
Route::post('update/category',[CategoryController::class,'updateCategory'])->name('update-category');
Route::get('delete/category/{id}',[CategoryController::class,'deleteCategory'])->name('delete-category');
Route::get('restore/category/{id}',[CategoryController::class,'restoreCategory'])->name('restore-category');
Route::get('permanent/delete/category/{id}',[CategoryController::class,'permanentDeleteCategory'])->name('permanent-delete-category');

//Brand Route...
Route::get('all/brand',[BrandController::class,'allBrand'])->name('all-brand');
Route::post('save/brand',[BrandController::class,'saveBrand'])->name('save-brand');
Route::get('edit/brand/{id}',[BrandController::class,'editBrand'])->name('edit-brand');
Route::post('update/brand/{id}',[BrandController::class,'updateBrand'])->name('update-brand');
Route::get('delete/brand/{id}',[BrandController::class,'deleteBrand'])->name('delete-brand');

//MUlti image route.....
Route::get('multi/image',[BrandController::class,'multiImage'])->name('multi-image');
Route::post('multi/image',[BrandController::class,'saveMultipleImage'])->name('save-multiple-image');

// Slider route.....
Route::get('home/slider',[HomeController::class,'homeSlider'])->name('home-slider');
Route::get('add/slider',[HomeController::class,'addSlider'])->name('add-slider');
Route::post('save/slider',[HomeController::class,'saveSlider'])->name('save-slider');

//About route......
Route::get('home/about',[AboutController::class,'homeAbout'])->name('home-about');
Route::get('add/about',[AboutController::class,'addAbout'])->name('add-about');
Route::post('save/about',[AboutController::class,'saveAbout'])->name('save-about');
Route::get('edit/about/{id}',[AboutController::class,'editAbout'])->name('edit-about');
Route::post('update/about',[AboutController::class,'updateAbout'])->name('update-about');
Route::get('delete/about/{id}',[AboutController::class,'deleteAbout'])->name('delete-about');

//Portfolio route...
Route::get('home/portfolio',[PortFolioController::class,'portfolio'])->name('home-portfolio');
Route::get('home/contact',[ContactController::class,'contact'])->name('home-contact');
//Contact route.....
Route::get('admin/contact/profile',[Contactcontroller::class,'index'])->name('admin-contact');
Route::get('admin/add/contact',[Contactcontroller::class,'addContact'])->name('add-contact');
Route::post('admin/save/contact',[Contactcontroller::class,'saveContact'])->name('save-contact');
Route::get('admin/contact/message',[Contactcontroller::class,'contactMessage'])->name('contact-message');
Route::get('delete/message/{id}',[Contactcontroller::class,'deleteMessage'])->name('delete-message');

//contact form route......
Route::post('save/contact/form',[Contactcontroller::class,'saveContactForm'])->name('save-contact-form');

//Change Password route......
Route::get('change/password',[ChangePassword::class,'changePassword'])->name('change-password');
Route::post('update/password',[ChangePassword::class,'updatePassword'])->name('update-password');
//profile udpate route......
Route::get('profile/update',[ChangePassword::class,'profileUpdate'])->name('profile-update');
Route::post('profile/update/user',[ChangePassword::class,'updateUserProfile'])->name('update-user-profile');



