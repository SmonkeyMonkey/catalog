<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Repositories\ProductRepository;
use App\Product;
use App\Question;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);
    }

    public function index($collection,$product){
        $collection=Collection::where('slug',$collection)->firstOrFail();
        $product=Product::where('slug',$product)->firstOrFail();
        $test = $this->productRepository->getRelatedProduct();
//        dd($test);
        return view('pages.product',compact('collection','product'));
    }
}
