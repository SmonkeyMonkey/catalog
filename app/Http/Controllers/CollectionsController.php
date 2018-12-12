<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function show($slug){
        $collection=Collection::where('slug',$slug)->firstOrFail();
        $products=$collection->products()->where('is_published',1)->get();
        return view('pages.collection',compact('collection','products'));
        //$collection=Collection::where('slug',$slug)->findOrFail();
    }
}
