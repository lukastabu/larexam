<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController as R;
use App\Http\Controllers\GroupController as G;
use App\Http\Controllers\ItemController as I;
use App\Http\Controllers\FrontController as F;
use App\Http\Controllers\OrderController as O;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// RESTAURANT ROUTERS
Route::prefix('restaurants')->name('restaurant-')->group(function () {
    Route::get('', [R::class, 'index'])->name('index')->middleware('rw:admin');
    Route::get('create', [R::class, 'create'])->name('create')->middleware('rw:admin');
    Route::post('', [R::class, 'store'])->name('store')->middleware('rw:admin');
    Route::get('edit/{restaurant}', [R::class,'edit'])->name('edit')->middleware('rw:admin');
    Route::put('{restaurant}', [R::class, 'update'])->name('update')->middleware('rw:admin');
    Route::delete('{restaurant}', [R::class,'destroy'])->name('delete')->middleware('rw:admin');
    // Route::get('show/{id}', [G::class, 'show'])->name('show')->middleware('rw:user');
    // Route::get('show', [G::class, 'link'])->name('show-route');
});

// GROUP ROUTERS
Route::prefix('groups')->name('group-')->group(function () {
    Route::get('', [G::class, 'index'])->name('index')->middleware('rw:admin');
    Route::get('create', [G::class, 'create'])->name('create')->middleware('rw:admin');
    Route::post('', [G::class, 'store'])->name('store')->middleware('rw:admin');
    Route::get('edit/{group}', [G::class,'edit'])->name('edit')->middleware('rw:admin');
    Route::put('{group}', [G::class, 'update'])->name('update')->middleware('rw:admin');
    Route::delete('{group}', [G::class,'destroy'])->name('delete')->middleware('rw:admin');
    // Route::get('show/{id}', [G::class, 'show'])->name('show')->middleware('rw:user');
    // Route::get('show', [G::class, 'link'])->name('show-route');
});
     
// ITEM ROUTERS
Route::prefix('items')->name('item-')->group(function () {
    Route::get('', [I::class, 'index'])->name('index')->middleware('rw:admin');
    Route::get('create', [I::class, 'create'])->name('create')->middleware('rw:admin');
    Route::post('', [I::class, 'store'])->name('store')->middleware('rw:admin');
    Route::get('edit/{item}', [I::class,'edit'])->name('edit')->middleware('rw:admin');
    Route::put('{item}', [I::class, 'update'])->name('update')->middleware('rw:admin');
    Route::delete('{item}', [I::class,'destroy'])->name('delete')->middleware('rw:admin');
    // Route::get('show/{id}', [I::class, 'show'])->name('show')->middleware('rw:user');
    // Route::get('show', [I::class, 'link'])->name('show-route');
});
    
// FRONT ROUTERS
Route::get('', [F::class, 'index'])->name('front-index');
Route::get('/front/show/{id}', [F::class, 'show'])->name('front-show');

// ORDER ROUTERS
Route::get('add-to-order/{item}', [O::class, 'create'])->name('order-create')->middleware('rw:user');
Route::post('store-order/{item}', [O::class, 'store'])->name('order-store')->middleware('rw:user');
Route::get('my-orders', [O::class, 'showMyOrders'])->name('my-orders')->middleware('rw:user');
Route::get('order-index', [O::class, 'index'])->name('order-index')->middleware('rw:admin');
Route::get('order-edit/{order}', [O::class, 'edit'])->name('order-edit')->middleware('rw:admin');
Route::put('{order}', [O::class, 'update'])->name('order-update')->middleware('rw:admin');
