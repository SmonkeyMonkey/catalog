<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function show($slug){
        $collection=Collection::where('slug',$slug)->firstOrFail();
        $products=$collection->products()->get();
        return view('pages.collection',compact('collection','products'));
    }
}
