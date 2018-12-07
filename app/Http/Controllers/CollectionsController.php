<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function show($slug){
        $collection=Collection::where('slug',$slug)->firstOrFail();
        return view('pages.collection',compact('collection','collections'));
        //$collection=Collection::where('slug',$slug)->findOrFail();
    }
}
