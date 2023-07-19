<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\product\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.home.home');
    })->name("admin.home.home");

    Route::group(['prefix' => 'category'], function () {

        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
       
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
       
        Route::post('/create', [CategoryController::class, 'add'])->name('admin.category.add');
       
        Route::get('/{slug}', [CategoryController::class, 'show'])->name('admin.category.show');
      
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
       
        Route::get('/delete/{slug}', [CategoryController::class, 'delete'])->name('admin.category.delete');
  
    });
    Route::group(['prefix' => 'product'], function () {

        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');


      
  
    });

});