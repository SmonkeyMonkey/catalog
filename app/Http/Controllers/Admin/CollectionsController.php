<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections=Collection::all();
        return view('admin.collection.index',compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::pluck('title','id');
        return view('admin.collection.create',compact('brands'));
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
            'title' => 'required',
        ]);
        $collection=Collection::create($request->all());
        $collection->setBrand($request->get('brand_id'));
        return redirect()->route('collection.index')->with('create','Коллекция успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection=Collection::findOrFail($id);
        $brands=Brand::pluck('title','id');
        return view('admin.collection.edit',compact('collection','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            ['title'=> 'required|min:2']);
        $collection=Collection::findOrFail($id);
        $collection->setBrand($request->get('brand_id'));
        $collection->update($request->all());
        return redirect()->route('collection.index')->with('update','Коллекция успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Collection::find($id)->delete();
        return redirect()->route('collection.index')->with('delete','Коллекция удалена');
    }
}
