<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::post('/testing', [\App\Http\Controllers\NodeController::class, 'my_test']);

Route::get('/', ['App\Http\Controllers\MainController', 'home']);

Route::get('/about', '\App\Http\Controllers\MainController@about');

Route::get('/review', '\App\Http\Controllers\MainController@review');

Route::get('/node', [\App\Http\Controllers\NodeController::class, 'list']);

Route::get('/node/add', [\App\Http\Controllers\NodeController::class, 'addOrEdit'])
    ->name('add-node');

Route::get('/node/edit/{nodeId}', [\App\Http\Controllers\NodeController::class, 'addOrEdit'])
    ->where('nodeId', '[0-9]+')
    ->name('edit-node');

Route::post('/node/add', [\App\Http\Controllers\NodeController::class, 'addProcess']);

Route::post('/node/edit/{nodeId}', [\App\Http\Controllers\NodeController::class, 'editProcess'])
    ->where('nodeId', '[0-9]+')
    ->name('edit-node');

Route::get('/node/delete/{nodeId}', [\App\Http\Controllers\NodeController::class, 'delete'])
    ->where('nodeId', '[0-9]+')
    ->name('delete-node');


Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'category']);

Route::get('/category/add', [\App\Http\Controllers\CategoryController::class, 'categoryAddOrEdit'])
    ->name('add-category');

Route::get('/category/edit/{category_id}', [\App\Http\Controllers\CategoryController::class, 'categoryAddOrEdit'])
    ->where('category_id', '[0-9]+')
    ->name('edit-category');

Route::post('/category/add', [\App\Http\Controllers\CategoryController::class, 'categoryAddProcess']);

Route::post('/category/edit/{category_id}', [\App\Http\Controllers\CategoryController::class, 'categoryEditProcess'])
    ->where('category_id', '[0-9]+')
    ->name('edit-category');

Route::post('/category/delete/{category_id}', [\App\Http\Controllers\CategoryController::class, 'categoryDelete'])
    ->where('category_id', '[0-9]+')
    ->name('delete-category');


