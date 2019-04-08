<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Repositories\CollectionRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\QuestionRepository;
use App\Product;
use App\Question;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    private $collectionRepository;
    private $questionRepository;
    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);
        $this->collectionRepository = app(CollectionRepository::class);
        $this->questionRepository = app(QuestionRepository::class);
    }

    public function index($collection,$product){
        $collectionProduct = $this->collectionRepository->getCollectionAndRelatedProduct($collection); // get related products and category
        $product = $this->productRepository->getProducts($product);
        return view('pages.product',compact('collectionProduct','product'));
    }
}
