<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix'=>'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
