<?php

namespace App\Http\Controllers\Admin;


use App\Http\Repositories\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct()
    {
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAllWithPaginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userID = Category::getUserID();
        return view('admin.categories.create',compact('userID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        $category->create($request->all());
        $category->uploadImage($request->file('image'));
        return redirect()->route('category.index')->with('create', 'Категория успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->getEdit($id);
        $userID = Category::getUserID();
        return view('admin.categories.edit', compact('category','userID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->uploadImage($request->file('image'));
        $category->update($request->all());


        return redirect()->route('category.index')->with('update', 'Категория успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->remove();
        return redirect()->route('category.index')->with('delete', 'Коллекция успешно удалена');
    }
}
