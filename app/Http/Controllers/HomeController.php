<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Repositories\BrandRepository;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\NewsRepository;
use App\Http\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use App\Collection;

class HomeController extends Controller
{
    private $brandRepository;
    private $questionRepository;
    private $categoryRepository;
    private $newsRepository;

    public function __construct()
    {
        $this->brandRepository = app(BrandRepository::class);
        $this->questionRepository = app(QuestionRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
        $this->newsRepository = app(NewsRepository::class);
    }

    public function index()
    {
        $brands = $this->brandRepository->getBrandsForIndexPage();
        $questions = $this->questionRepository->getQuestionsForIndexPage();
        $categories = $this->categoryRepository->getCategoriesForIndexPage();
        $news = $this->newsRepository->getNewsForIndexPage();
        return view('pages.index', compact('brands', 'questions', 'categories', 'news'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function objects()
    {
        return view('pages.objects');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->getCategoryShowPage($slug);

//        $category = Category::where('slug', $slug)->firstOrFail();
//        $brands = $category->brands()->where('is_published', 1)->get();
        return view('pages.category', compact('category'));
    }
}
