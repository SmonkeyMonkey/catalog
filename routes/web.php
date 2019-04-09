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

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware'=> 'auth'],function (){
    Route::get('/','DashboardController@index')->name('admin.index');
    Route::resource('/category','CategoryController');
    Route::resource('/brand','BrandController')->except('show');
    Route::resource('/product','ProductController')->except('show');
    Route::resource('/collection','CollectionController')->except('show');
    Route::resource('/question','QuestionController')->except('show','store','create');
    Route::resource('/news','NewsController')->except('show');
    Route::resource('/users','UserController')->except('show');
});
Route::get('/','HomeController@index')->name('index');
Route::get('/about','HomeController@about')->name('about');
Route::get('/services','HomeController@services')->name('services');
Route::get('/objects','HomeController@objects')->name('objects');
Route::get('/contacts','HomeController@contacts')->name('contacts');
Route::get('/categories/{slug}','HomeController@show')->name('category.brand');
Route::get('/collections/{slug}','CollectionController@show')->name('collections.show');
Route::get('/collections/{collection}/{product?}','ProductController@index')->name('products.show');
Route::post('/comment','QuestionController@store')->name('question.add');
Route::get('/news/{slug}','NewsController@show')->name('article.show');


Route::get('/login','Admin\LoginController@loginForm')->middleware('guest')->name('login.form');
Route::post('/login','Admin\LoginController@login')->middleware('guest')->name('login');


Route::get('/logout','Admin\LoginController@logout')->middleware('auth')->name('logout');
