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

// FRONTEND
Route::get('', 'frontend\HomeController@getHome');
Route::get('about', 'frontend\HomeController@getAbout');
Route::get('contact', 'frontend\HomeController@getContact');

Route::group(['prefix' => 'product'], function() {
    Route::get('', 'frontend\ProductController@listProduct');
    Route::get('cart', 'frontend\ProductController@getCart');
    Route::get('detail', 'frontend\ProductController@detailProduct');
    Route::get('checkout', 'frontend\ProductController@checkOut');
    Route::get('complete', 'frontend\ProductController@complete');
});



// BACKEND
Route::get('login', 'backend\LoginController@getLogin')->middleware('CheckLogin');
Route::post('login', 'backend\LoginController@postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdmin'], function() {
    Route::get('', 'backend\LoginController@getIndex');

    Route::get('logout', 'backend\LoginController@logout');

    //Category
    Route::group(['prefix' => 'category'], function() {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::post('', 'backend\CategoryController@postCategory');
        Route::get('edit/{id}', 'backend\CategoryController@editCategory');
        Route::post('edit/{id}', 'backend\CategoryController@postEditCategory');

        Route::get('del/{id}', 'backend\CategoryController@delCategory');
    });
    
    //Product
    Route::group(['prefix' => 'product'], function() {
        Route::get('', 'backend\ProductController@listProduct');
        Route::get('add', 'backend\ProductController@addProduct');
        Route::post('add', 'backend\ProductController@postAddProduct');
        Route::get('edit/{id}', 'backend\ProductController@editProduct');
        Route::post('edit/{id}', 'backend\ProductController@postEditProduct');
        Route::get('del/{id}', 'backend\ProductController@delProduct');

        Route::get('detail-attr', 'backend\ProductController@detailAttr');
        Route::get('edit-attr/{id}', 'backend\ProductController@editAttr');
        Route::post('edit-attr/{id}', 'backend\ProductController@postEditAttr');
        Route::post('add-attr', 'backend\ProductController@addAttr');
        Route::get('del-attr/{id}', 'backend\ProductController@delAttr');

        Route::post('add-value', 'backend\ProductController@addValue');
        Route::get('edit-value/{id}', 'backend\ProductController@editValue');
        Route::post('edit-value/{id}', 'backend\ProductController@postEditValue');
        Route::get('del-value/{id}', 'backend\ProductController@delValue');

        Route::get('add-variant/{id}', 'backend\ProductController@addVariant');
        Route::post('add-variant/{id}', 'backend\ProductController@postAddVariant');
        Route::get('edit-variant/{id}', 'backend\ProductController@editVariant');
        Route::post('edit-variant/{id}', 'backend\ProductController@postEditVariant');
        Route::get('del-variant/{id}', 'backend\ProductController@delVariant');
    });

    //Order 
   Route::group(['prefix' => 'order'], function() {
       Route::get('', 'backend\OrderController@listOrder');
       Route::get('detail', 'backend\OrderController@detailOrder');
       Route::get('processed', 'backend\OrderController@processedOrder');
   });
   
    
});

