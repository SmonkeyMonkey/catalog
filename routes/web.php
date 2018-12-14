<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/i', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function (){
    Route::get('/','DashboardController@index')->name('admin.index');
    Route::resource('/category','CategoriesController');
    Route::resource('/brand','BrandsController');
    Route::resource('/product','ProductsController');
    Route::resource('/collection','CollectionsController');
});
Route::get('/','HomeController@index')->name('index');
Route::get('/about','HomeController@about')->name('about');
Route::get('/services','HomeController@services')->name('services');
Route::get('/objects','HomeController@objects')->name('objects');
Route::get('/contacts','HomeController@contacts')->name('contacts');
Route::get('/categories/{slug}','HomeController@show')->name('category.brand');
Route::get('/collections/{slug}','CollectionsController@show')->name('collections.show');
//Route::get('/products/{slug}','ProductsController@index')->name('products.index');
Route::get('/collections/{collection}/{product?}','ProductsController@index')->name('test');
