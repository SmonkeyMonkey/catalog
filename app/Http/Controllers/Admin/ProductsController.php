<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
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
        return view('admin.product.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:2',
            'image' => 'nullable|image'
        ]);

        $product=Product::create($request->all());
        $product->setBrand($request->get('brand_id'));
        $product->uploadImage($request->file('image'));
        $product->toggleStatus($request->get('is_published'));
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
        return view('admin.product.edit',compact('product','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'nullable|image'
        ]);
        $product=Product::findOrFail($id);
        $product->update($request->all());
        $product->uploadImage($request->file('image'));
        $product->setBrand($request->get('brand_id'));
        $product->toggleStatus($request->get('is_published'));
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