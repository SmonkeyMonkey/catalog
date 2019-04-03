<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Collection;
use App\Http\Repositories\CollectionRepository;
use App\Http\Requests\CollectionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class CollectionController extends Controller
{
    private $collectionRepository;
    public function __construct()
    {
        $this->collectionRepository = app(CollectionRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = $this->collectionRepository->getAllWithPaginate(10);
        return view('admin.collection.index',compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->collectionRepository->getBrands();
        return view('admin.collection.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {
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
        $collection=$this->collectionRepository->getEdit($id);
        $brands= $this->collectionRepository->getBrands();

        return view('admin.collection.edit',compact('collection','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, $id)
    {
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
