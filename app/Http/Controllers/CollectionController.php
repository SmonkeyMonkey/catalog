<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Repositories\CollectionRepository;
use App\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    private $collectionRepository;
    public function __construct()
    {
        $this->collectionRepository = app(CollectionRepository::class);
    }

    public function show($slug){
      $collection = $this->collectionRepository->getAllForCollectionPage($slug);
        return view('pages.collection',compact('collection','products'));
    }
}
