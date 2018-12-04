<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('title','id')->all();
        return view('admin.brands.create',compact('categories'));
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
            'title'         => 'required|min:2',
            'description'   => 'required|min:3',
            'about'         => 'required|min:5',
            'image'         => 'nullable|image'
        ]);
        $brand=Brand::create($request->all());
        $brand->uploadImage($request->file('image'));
        $brand->toggleStatus($request->get('is_published'));
        $brand->setCategory($request->get('category_id'));
        return redirect()->route('brand.index')->with('create','Бренд успешно добавлен');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::find($id);
        return view('admin.brands.edit',compact('brand'));
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
            'title'         => 'required|min:2',
            'description'   => 'required|min:3',
            'about'         => 'required|min:5',
            'image'         => 'nullable|image'
        ]);
        $brand=Brand::findOrFail($id);
        $brand->update($request->all());
        $brand->uploadImage($request->file('image'));
        $brand->toggleStatus($request->get('is_published'));
        return redirect()->route('brand.index')->with('update','Производитель успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::findOrFail($id)->remove();
        return redirect()->route('brand.index')->with('delete','Производитель успешно удален');
    }
}
