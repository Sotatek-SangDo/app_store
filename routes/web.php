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

Route::get('/', 'HomeController@index')->name('home');

Route::get('detail/{id?}', 'HomeController@detail');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {

    Route::get("/dashboard", 'AdminController@dashboard')->name('admin-home');

    Route::get('/', 'AdminController@dashboard')->name('admin');

    Route::group(['prefix' => 'product'], function() {

        Route::get('/list', 'AdminController@productList')->name('pro_list');

        Route::get('/add', 'AdminController@addNewProduct')->name('add-pro');

        Route::post('/store', 'AdminController@productStore')->name('add-product');

         Route::get('/update/{id}', 'AdminController@updateProduct')->name('pro-g-update');

        Route::post('/update/{id}', 'AdminController@updateProduct')->name('pro-update');

        Route::post('/delete', 'AdminController@deleteProduct')->name('remove-pro');
    });
    
    Route::group(['prefix' => 'category'], function() {

        Route::get('/list', 'AdminController@catList')->name('cat_list');

        Route::get('/add', 'AdminController@addNewCategory')->name('add-cat');

        Route::post('/store', 'AdminController@catStore')->name('add-category');

        Route::get('/update/{id}', 'AdminController@updateCategory')->name('get-update');

        Route::post('/update/{id}', 'AdminController@updateCat')->name('cat-update');

        Route::post('/delete', 'AdminController@deleteCat')->name('remove-cat');
    });

});