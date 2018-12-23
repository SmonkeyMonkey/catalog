<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($collection,$product){
        $collection=Collection::where('slug',$collection)->firstOrFail();
        $product=Product::where('slug',$product)->firstOrFail();
        \Debugbar::enable();
        return view('pages.product',compact('collection','product'));
    }
}
