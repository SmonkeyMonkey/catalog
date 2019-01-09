<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($slug){
        $news=News::where('slug',$slug)->firstOrFail();
        $otherNews=News::latest()->take(10)->get();
        return view('pages.news',compact('news','otherNews'));
    }
}
