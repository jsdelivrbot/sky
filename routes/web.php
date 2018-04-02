<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('/products/filter', 'ProductsController@filter');
Route::get('/products', 'ProductsController@index');
Route::get('/products/{id}', 'ProductsController@show');
Route::post('/products', 'ProductsController@products');
Route::post('/products/search', 'ProductsController@search');
Route::get('/about', 'HomeController@about');
Route::get('/infinity', 'HomeController@infinity');
Route::get('/founders', 'HomeController@founders');
Route::get('/members_events', 'HomeController@members_events');
Route::get('/processes', 'HomeController@processes');
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'HomeController@add_contact');
Route::post('/search_user_id', 'TeamController@search_user_id');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/team', 'TeamController@index');
    Route::post('/addDownLine', 'TeamController@store');
    Route::post('/order', 'OrdersController@index');
    Route::get('/wallet', 'WalletController@index');
    Route::post('/transfer', 'WalletController@transfer');
});


Route::prefix('admin')->group(function () {

    Route::get('/', 'admin\HomeController@index');
    Route::post('/login', 'admin\HomeController@login');
    Route::post('/users_filter', 'admin\UsersController@filter');
    Route::post('/users/{id}/qualified', 'admin\UsersController@qualified');
    Route::resource('/users', 'admin\UsersController');
    Route::resource('/products', 'admin\ProductsController');
    Route::resource('/categories', 'admin\CategoriesController');
    Route::resource('/sub_categories', 'admin\Sub_categoriesController');
    Route::resource('/orders', 'admin\OrdersController');
    Route::resource('/banks', 'admin\BanksController');
    Route::resource('/permissions', 'admin\PermissionsController');
    Route::post('/products_filter', 'admin\ProductsController@filter');
    Route::post('/orders_filter', 'admin\OrdersController@filter');

});


Route::prefix('ajax')->group(function () {
    Route::get('check_email/{email}', 'AjaxController@check_email');
    Route::post('/getSubCategories', 'AjaxController@getSubCategories');
    Route::post('/getDownLines', 'AjaxController@getDownLines');
});