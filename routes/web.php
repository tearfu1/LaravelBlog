<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('admin.main.index');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/',IndexController::class)->name('admin.category.index');
        Route::get('/create',CreateController::class)->name('admin.category.create');
        Route::post('/',StoreController::class)->name('admin.category.store');
        Route::get('/{category}',ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit',EditController::class)->name('admin.category.edit');
        Route::patch('/{category}',UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}',DestroyController::class)->name('admin.category.destroy');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/',IndexController::class)->name('admin.tag.index');
        Route::get('/create',CreateController::class)->name('admin.tag.create');
        Route::post('/',StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}',ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit',EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}',UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}',DestroyController::class)->name('admin.tag.destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
