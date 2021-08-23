<?php

namespace App\Http\Controllers;

use App\Models\MultipleImage;
use Illuminate\Http\Request;

class PortFolioController extends Controller
{
    public function portfolio(){
        $images = MultipleImage::all();
        return view('frontend.portfolio.index',['images'=>$images]);
    }
}
