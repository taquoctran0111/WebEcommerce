<?php

Route::get('/', function () {
    return view('admin.home');
});
// Route::get('/admin', function () {
//     return view('admin.home');
// });

Route::prefix('categories')->group(function () {
    Route::get('/', [
        'as' => 'categories.index',
        'uses' => 'CategoryController@index' 
    ]);
    Route::get('/create', [
        'as' => 'categories.create',
        'uses' => 'CategoryController@create' 
    ]);
});