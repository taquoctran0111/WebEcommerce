<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.index');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin/login', function () {
    return view('admin.account.login');
});
Route::prefix('/admin/categories')->group(function () {
    Route::get('/', [
        'as' => 'categories.index',
        'uses' => 'CategoryController@index'
    ]);
    Route::get('/create', [
        'as' => 'categories.create',
        'uses' => 'CategoryController@create'
    ]);
    Route::post('/store', [
        'as' => 'categories.store',
        'uses' => 'CategoryController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'categories.edit',
        'uses' => 'CategoryController@edit'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'categories.delete',
        'uses' => 'CategoryController@delete'
    ]);
    Route::post('/update/{id}', [
        'as' => 'categories.update',
        'uses' => 'CategoryController@update'
    ]);
});
Route::prefix('/admin/menus')->group(function () {
    Route::get('/', [
        'as' => 'menus.index',
        'uses' => 'MenuController@index'
    ]);
    Route::get('/create', [
        'as' => 'menus.create',
        'uses' => 'MenuController@create'
    ]);
    Route::post('/store', [
        'as' => 'menus.store',
        'uses' => 'MenuController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'menus.edit',
        'uses' => 'MenuController@edit'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'menus.delete',
        'uses' => 'MenuController@delete'
    ]);
    Route::post('/update/{id}', [
        'as' => 'menus.update',
        'uses' => 'MenuController@update'
    ]);
});
// Route::prefix('client')->group(function () {
//     Route::get('/', [
//         'as' => 'client.index',
//         'uses' => 'ClientController@index' 
//     ]);
// });