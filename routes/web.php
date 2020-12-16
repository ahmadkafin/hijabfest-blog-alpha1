<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::resource('dashboard', AdminController::class);
    Route::get('articles', [ArticlesController::class, 'index']);
    Route::group(['prefix' => 'articles'], function () {
        Route::get('create', [ArticlesController::class, 'create']);
        Route::post('store', [ArticlesController::class, 'store']);
        Route::get('getSlug', [ArticlesController::class, 'getSlug'])->name('cekslug');
        Route::get('edit/{id}', [ArticlesController::class, 'edit']);
        Route::put('update/{id}', [ArticlesController::class, 'update']);
        Route::delete('delete/{id}', [ArticlesController::class, 'destroy'])->name('deletes');
        Route::get('show/{slug}', [ArticlesController::class, 'show']);
        Route::get('publish/{id}', [ArticlesController::class, 'publishArticle']);
    });
    Route::group(['prefix' => 'events'], function () {
        Route::get('getSlugForEvent', [EventController::class, 'slugs'])->name('getSlugs');
    });
    Route::resource('categories', CategoriesController::class);
    Route::resource('events', EventController::class);
});

Route::group(['prefix' => 'publish'], function () {
});
