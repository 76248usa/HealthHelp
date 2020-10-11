<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/index/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontProductListController@index');
Route::get('/physician/{id}', 'FrontProductListController@show')->name('physician.view');
Route::get('all/physicians', 'FrontProductListController@moreProducts')->name('more.physician');
Route::get('/category/{name}', 'FrontProductListController@allProduct')->name('physician.list');





Route::group(['prefix' => 'auth', 'middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('category', 'CategoryController');

    Route::resource('subcategory', 'SubcategoryController');

    Route::resource('physician', 'PhysicianController');

    Route::get('subcategories/{id}', 'PhysicianController@loadSubCategories');
});
