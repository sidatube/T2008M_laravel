<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\LapController;
use App\Http\Controllers\categoryController;

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

//Route::get('/', [WebController::class,"home"]);
//Route::get('/about-us', [WebController::class,"aboutUs"]);
    Route::get('/', [LapController::class,"home"]);
    Route::get('/addoredit', [LapController::class,"add"]);
    Route::get('/save', [LapController::class,"savepro"]);
    Route::get('/categories', [categoryController::class,"all"]);
    Route::get('/categories/new', [categoryController::class,"new"]);
    Route::post('/categories/save', [categoryController::class,"save"]);
    Route::get('/categories/edit/{id}', [categoryController::class,"edit"]);
    Route::post('/categories/update/{id}', [categoryController::class,"update"]);
