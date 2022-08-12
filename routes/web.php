<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Str;

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

Route::get('/', ['App\Http\Controllers\ShopController', 'mainShop']);

Route::get('/admin', ['App\Http\Controllers\ShopController', 'admin']);

Route::get('/admin/category', ['App\Http\Controllers\ShopController', 'admin_category']);

Route::get('/admin/category/category_management', ['App\Http\Controllers\ShopController', 'create_category']);

Route::post('/admin/category/category_management/add', ['App\Http\Controllers\ShopController', 'add_category']);

Route::get('/admin/category/category_management/edit/{category_id}', ['App\Http\Controllers\ShopController', 'edit_category'])
    ->where('category_id', '[0-9]+')
    ->name('edit-category');

Route::post('/admin/category/category_management/edit/{category_id}', ['App\Http\Controllers\ShopController', 'save_category'])
    ->where('category_id', '[0-9]+')
    ->name('edit-category');

Route::get('/admin/category/category_management/delete/{category_id}', ['App\Http\Controllers\ShopController', 'delete_category'])
    ->where('category_id', '[0-9]+')
    ->name('delete-category');
