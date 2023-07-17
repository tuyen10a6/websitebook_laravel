<?php

namespace App\Http\Controllers\category;

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

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    
    Route::get('/category/create',[CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/create',[CategoryController::class,'add'])->name('admin.category.add');
});