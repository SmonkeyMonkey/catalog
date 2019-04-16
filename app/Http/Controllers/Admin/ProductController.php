<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Collection;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $productRepository;
    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= $this->productRepository->getAllWithPaginate(15);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands= $this->productRepository->getBrands();
        $collections= $this->productRepository->getCollections();
        return view('admin.product.create',compact('brands','collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product=Product::create($request->all());
        $product->setBrand($request->get('brand_id'));
        $product->setCollection($request->get('collection_id'));
        $product->uploadImage($request->file('image'));
        return redirect()->route('product.index')->with('create','Товар успешно добавлен');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=$this->productRepository->getEdit($id);

        $brands= $this->productRepository->getBrands();
        $collections= $this->productRepository->getCollections();

        return view('admin.product.edit',compact('product','brands','collections','userID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product=Product::findOrFail($id);
        $product->update($request->all());
        $product->uploadImage($request->file('image'));
        $product->setBrand($request->get('brand_id'));
        $product->setCollection($request->get('collection_id'));
        return redirect()->route('product.index')->with('update','Продукт успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->remove();
        return redirect()->route('product.index')->with('delete','Продукт успешно удален');
    }
}
