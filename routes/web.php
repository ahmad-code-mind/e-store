<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/',[AdminController::class, 'index']);

    // *************************************Category****************************************  //
    Route::prefix('admin/category')->group(function(){
        Route::get('/',[CategoryController::class, 'index']);
        Route::get('get-category',[CategoryController::class, 'show'])->name('get.category');
        Route::get('add',[CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('add',[CategoryController::class, 'store'])->name('add-category');
        Route::get('edit/{id}',[CategoryController::class, 'showedit'])->name('show-edit-category');
        Route::put('edit/{id}',[CategoryController::class, 'edit'])->name('edit-category');
        Route::get('delete/{id}',[CategoryController::class, 'delete'])->name('delete-category');
    });
    // ***********************************End Category**************************************  //

    // *************************************Product*****************************************  //
    Route::prefix('admin/product')->group(function(){
        Route::get('/',[ProductController::class, 'index']);
        Route::get('get',[ProductController::class, 'show'])->name('get.product');
        Route::get('add',[ProductController::class, 'add'])->name('admin.product.add');
        Route::post('store',[ProductController::class, 'store'])->name('store-product');
        Route::get('edit/{id}',[ProductController::class, 'showedit'])->name('show-edit-product');
        Route::put('edit/{id}',[ProductController::class, 'edit'])->name('edit-product');
        Route::get('delete/{id}',[ProductController::class, 'delete'])->name('delete-product');
    });
    // ***********************************End Product***************************************  //
 });