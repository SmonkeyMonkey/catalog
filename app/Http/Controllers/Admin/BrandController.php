<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Repositories\BrandRepository;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    private $brandRepository;
    public function __construct()
    {
        $this->brandRepository = app(BrandRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brandRepository->getAllWithPaginate(10);
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->brandRepository->getCategories();

        return view('admin.brands.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {

        $brand=Brand::create($request->all());
        $brand->uploadImage($request->file('image'));
        $brand->toggleStatus($request->get('is_published'));
        $brand->setCategory($request->get('category_id'));
        $brand->setCollections($request->get('collections'));
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
        $brand = $this->brandRepository->getEdit($id);
        $categories = $this->brandRepository->getCategories();
        return view('admin.brands.edit',compact('brand','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $brand=Brand::find($id);
        $brand->update($request->all());
        $brand->uploadImage($request->file('image'));
        $brand->setCategory($request->get('category_id'));
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
