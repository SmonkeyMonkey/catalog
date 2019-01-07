<?php

namespace App\Providers;

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
            $view->with('categories',Category::all());
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
