<?php

namespace App\Providers;

use App\Brand;
use App\Observers\BrandObserver;
use App\Observers\CategoryObserver;
use App\Observers\ProductObserver;
use App\Observers\QuestionObserver;
use App\Product;
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

        Brand::observe(BrandObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Question::observe(QuestionObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
