<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\AdminController;
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
    Route::get('/categories',[CategoryController::class, 'index']);
    Route::get('get-categories',[CategoryController::class, 'show'])->name('get.category');
    Route::get('add-categories',[CategoryController::class, 'add'])->name('admin.category.add');
    Route::post('add-categories',[CategoryController::class, 'store'])->name('add-category');
    Route::get('show-edit-categories/{id}',[CategoryController::class, 'showedit'])->name('show-edit-category');
    Route::put('edit-categories/{id}',[CategoryController::class, 'edit'])->name('edit-category');
    Route::get('delete-categories/{id}',[CategoryController::class, 'delete'])->name('delete-category');
    // ***********************************End Category**************************************  //
 });