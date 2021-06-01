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

Route::get('login', 'backend\LoginController@getLogin');

Route::group(['prefix' => 'admin'], function() {
    Route::get('', 'backend\LoginController@getIndex');

    //Category
    Route::group(['prefix' => 'category'], function() {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::get('edit', 'backend\CategoryController@editCategory');
    });
    
    //Product
    Route::group(['prefix' => 'product'], function() {
        Route::get('', 'backend\ProductController@listProduct');
        Route::get('add', 'backend\ProductController@addProduct');
        Route::get('edit', 'backend\ProductController@editProduct');

        Route::get('detail-attr', 'backend\ProductController@detailAttr');
        Route::get('edit-attr', 'backend\ProductController@editAttr');

        Route::get('edit-value', 'backend\ProductController@editValue');

        Route::get('add-variant', 'backend\ProductController@addVariant');
        Route::get('edit-variant', 'backend\ProductController@editVariant');
    });

    //Order 
   Route::group(['prefix' => 'order'], function() {
       Route::get('', 'backend\OrderController@listOrder');
       Route::get('detail', 'backend\OrderController@detailOrder');
       Route::get('processed', 'backend\OrderController@processedOrder');
   });
   
    
});

