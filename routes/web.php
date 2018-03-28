<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('/products/filter', 'ProductsController@filter');
Route::get('/products', 'ProductsController@index');
Route::post('/products', 'ProductsController@products');
Route::post('/products/search', 'ProductsController@search');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/team', 'TeamController@index');
    Route::post('/addDownLine', 'TeamController@store');
    Route::post('/order', 'OrdersController@index');
    Route::get('/wallet', 'WalletController@index');
    Route::post('/transfer', 'WalletController@transfer');
});

Route::prefix('ajax')->group(function () {
    Route::get('check_email/{email}', 'AjaxController@check_email');
    Route::post('/getSubCategories', 'AjaxController@getSubCategories');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'admin\HomeController@index');
    Route::post('/users_filter', 'admin\UsersController@filter');
    Route::post('/users/{id}/qualified', 'admin\UsersController@qualified');
    Route::resource('/users', 'admin\UsersController@index');
});