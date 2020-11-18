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

Route::get('/', 'Backend\DashboardController@index')->name('dashboard');
/* All Authenticated routes here */
Auth::routes();

Route::group(array('middleware' => 'auth'), function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('/all-user', 'Backend\UsersController@getIndex')->name('logged_in.user.view');
        Route::get('/create', 'Backend\UsersController@getCreate')->name('admin.user.create');
        Route::post('/store', 'Backend\UsersController@postStore')->name('logged_in.user.store');
        Route::get('/edit/{id}', 'Backend\UsersController@getEdit')->name('logged_in.user.edit');
        Route::post('/update/{id}', 'Backend\UsersController@postUpdate')->name('logged_in.user.update');
        Route::post('/delete/{id}', 'Backend\UsersController@postDelete')->name('logged_in.user.delete');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/view', 'Backend\ProfileController@getIndex')->name('logged_in.user.profile.view');
        Route::get('/edit/{id}', 'Backend\ProfileController@getEdit')->name('logged_in.user.profile.edit');
        Route::post('/update/{id}', 'Backend\ProfileController@postUpdate')->name('logged_in.user.profile.update');
        Route::get('/password/view', 'Backend\ProfileController@getPasswordView')->name('logged_in.user.profile.password_view');
        Route::post('/password/update', 'Backend\ProfileController@postPasswordUpdate')->name('logged_in.user.profile.password_update');
    });


    Route::group(['prefix' => 'suppliers'], function () {
        Route::get('/view', 'Backend\SuppliersController@getIndex')->name('admin.suppliers.view');
        Route::get('/create', 'Backend\SuppliersController@getCreate')->name('admin.supplier.create');
        Route::post('/store', 'Backend\SuppliersController@postStore')->name('admin.supplier.store');
        Route::get('/edit/{id}', 'Backend\SuppliersController@getEdit')->name('admin.supplier.edit');
        Route::post('/update/{id}', 'Backend\SuppliersController@postUpdate')->name('admin.supplier.update');
        Route::post('/delete/{id}', 'Backend\SuppliersController@postDelete')->name('admin.supplier.delete');
    });

    Route::group(['prefix' => 'customers'], function () {
        Route::get('/view', 'Backend\CustomersController@getIndex')->name('admin.customers.view');
        Route::get('/create', 'Backend\CustomersController@getCreate')->name('admin.customers.create');
        Route::post('/store', 'Backend\CustomersController@postStore')->name('admin.customers.store');
        Route::get('/edit/{id}', 'Backend\CustomersController@getEdit')->name('admin.customers.edit');
        Route::post('/update/{id}', 'Backend\CustomersController@postUpdate')->name('admin.customers.update');
        Route::post('/delete/{id}', 'Backend\CustomersController@postDelete')->name('admin.customers.delete');
    });


});


Route::group(['prefix' => 'brand'], function () {
    Route::get('/index', 'Backend\BrandsController@getIndex')->name('admin.brand.view');
    Route::get('/create', 'Backend\BrandsController@getCreate')->name('admin.brand.create');
    Route::post('/store', 'Backend\BrandsController@postStore')->name('admin.brand.store');
    Route::get('/edit/{id}', 'Backend\BrandsController@getEdit')->name('admin.brand.edit');
    Route::post('/update/{id}', 'Backend\BrandsController@postUpdate')->name('admin.brand.update');
    Route::post('/delete/{id}', 'Backend\BrandsController@postDelete')->name('admin.brand.delete');

});

Route::group(['prefix' => 'category'], function () {
    Route::get('/view', 'Backend\CategoryController@getIndex')->name('admin.category.view');
    Route::get('/create', 'Backend\CategoryController@getCreate')->name('admin.category.create');
    Route::post('/store', 'Backend\CategoryController@store')->name('admin.category.store');
    Route::get('/edit/{id}', 'Backend\CategoryController@getEdit')->name('admin.category.edit');
    Route::post('/update/{id}', 'Backend\CategoryController@postUpdate')->name('admin.category.update');
    Route::post('/delete/{id}', 'Backend\CategoryController@postDelete')->name('admin.category.delete');

});
