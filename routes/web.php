<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\LapController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

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

    Route::get('/', [WebController::class,"home"]);
    Route::get('/products', [ProductController::class,"all"]);
    Route::get('/products/new', [ProductController::class,"new"]);
    Route::post('/products/save', [ProductController::class,"save"]);
    Route::post('/products/update/{id}', [ProductController::class,"update"]);
    Route::get('/products/edit/{id}', [ProductController::class,"edit"]);
    Route::get('/products/delete/{id}', [ProductController::class,"delete"]);
    Route::get('/about-us', [WebController::class,"aboutUs"]);
    Route::get('/categories', [categoryController::class,"all"]);
    Route::get('/categories/new', [categoryController::class,"new"]);
    Route::post('/categories/save', [categoryController::class,"save"]);
    Route::get('/categories/edit/{id}', [categoryController::class,"edit"]);
    Route::post('/categories/update/{id}', [categoryController::class,"update"]);
    Route::get('/brands', [BrandController::class,"all"]);
    Route::get('/brands/new', [BrandController::class,"new"]);
    Route::post('/brands/save', [BrandController::class,"save"]);
    Route::get('/brands/edit/{id}', [BrandController::class,"edit"]);
    Route::post('/brands/update/{id}', [BrandController::class,"update"]);

