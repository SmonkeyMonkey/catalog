<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Collection;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(15);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::pluck('title','id')->all();
        $collections=Collection::pluck('title','id')->all();
        $userID = Product::getUserID();
        return view('admin.product.create',compact('brands','collections','userID'));
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
        $product=Product::findOrFail($id);
        $brands=Brand::pluck('title','id')->all();
        $userID= Product::getUserID();
        $collections=Collection::pluck('title','id')->all();
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
