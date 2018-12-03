<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        return view('pages.services');
    }
    public function objects(){
        return view('pages.objects');
    }
    public function contacts(){
        return view('pages.contacts');
    }
    public function show($slug){
        $category=Category::where('slug',$slug)->firstOrFail();
        $brands=Brand::where('is_published',1)->firstOrFail();
        return view('pages.category',compact('category','brands'));
    }
}
