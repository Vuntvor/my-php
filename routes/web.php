<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ShopController as AdminProductController;

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

Route::get('/', ['App\Http\Controllers\Admin\MainController', 'mainPage']);

Route::get('/admin', ['App\Http\Controllers\Admin\MainController', 'index']);

Route::prefix('/admin/category')->group(function () {

    Route::get('/', [AdminCategoryController::class, 'list'])->name('category.list');

    Route::get('/create', [AdminCategoryController::class, 'create'])->name('category.create');

    Route::post('/add', [AdminCategoryController::class, 'add'])->name('category.add');

    Route::get('/edit/{category_id}', [AdminCategoryController::class, 'edit'])
        ->where('category_id', '[0-9]+')
        ->name('category.edit');

    Route::post('/edit/{category_id}', [AdminCategoryController::class, 'save'])
        ->where('category_id', '[0-9]+')
        ->name('category.save');

    Route::get('/delete/{category_id}', [AdminCategoryController::class, 'delete'])
        ->where('category_id', '[0-9]+')
        ->name('category.delete');

});

Route::prefix('/admin/product')->group(function (){

    Route::get('/', [AdminProductController::class, 'list'])->name('product.list');

    Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');

    Route::post('/add', [AdminProductController::class, 'add'])->name('product.add');

});

