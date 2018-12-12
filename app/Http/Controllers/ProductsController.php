<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($collection,$slug){
        $collection=Collection::where('collection','slug')->firstOrFail();
        $product=Product::where('slug','slug')->firstOrFail();
        return view('product.index',compact('collection','product'));
    }
}
