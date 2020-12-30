<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\BoothsEventController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TenanController;
use App\Http\Controllers\TenanEventsController;
use App\Http\Controllers\UserController;
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
    Route::get('users/verification', [HomeController::class, 'accessToPageUsers']);
    Route::post('users/verifications', [HomeController::class, 'confirmPage'])->name('users.verifications');
    Route::put('users/updateStatus/{id}', [UserController::class, 'updateStatusUser'])->name('users.updateStatus')->middleware('lockpage');
    Route::resource('users', UserController::class)->middleware('lockpage');
    Route::get('tenan/brand/{slug}', [TenanController::class, 'tenanbrand'])->name('tenan.brand');
    Route::resource('tenan', TenanController::class);
    Route::get('events/{id}/tenan/', [TenanEventsController::class, 'index'])->name('events.tenant');
    Route::put('events/tenant/{id}', [TenanEventsController::class, 'approveTenant'])->name('events.tenant.update');
    Route::get('events/{id}/booths', [BoothsEventController::class, 'index'])->name('events.booths');
    Route::get('events/{id}/booths/add', [BoothsEventController::class, 'add'])->name('events.booths.add');
    Route::post('events/booths/store/{id}', [BoothsEventController::class, 'store'])->name('events.booths.store');
    Route::put('events/booths/marks/{id}', [BoothsEventController::class, 'markBooth'])->name('events.booths.marks');
    Route::put('events/booths/{id}/update', [BoothsEventController::class, 'updateBooth'])->name('events.booths.update.price');
    Route::put('events/booths/{id}/update-number', [BoothsEventController::class, 'updateNumberBooth'])->name('events.booths.update.number');
    Route::post('events/booths/update', [BoothsEventController::class, 'updateBatchBooth'])->name('events.booths.update.batch');
    Route::delete('events/booths/{id}/delete', [BoothsEventController::class, 'destroyBooth'])->name('events.booths.delete');
    Route::group(['prefix' => 'products'], function () {
        Route::get('getSlugs', [ProductsController::class, 'getSlugProducts'])->name('getSlugsProducts');
    });
    Route::resource('products', ProductsController::class);
});

Route::group(['prefix' => 'publish'], function () {
});
