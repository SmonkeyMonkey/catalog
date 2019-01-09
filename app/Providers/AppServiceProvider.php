<?php

namespace App\Providers;

use App\Brand;
use App\News;
use App\Question;
use Illuminate\Support\ServiceProvider;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('_sidebar',function ($view){
            $view->with('categories',Category::all());
        });
        view()->composer('admin._sidebar',function ($view){
            $view->with('newQuestions',Question::where('answer',null)->count());
        });
        view()->composer('pages.index',function ($view){
            $view->with('brands',Brand::latest()->take(4)->get());
            $view->with('questions',Question::where('is_active',1)->take(3)->get());
            $view->with('categories',Category::all());
            $view->with('news',News::latest()->take(3)->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
