<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [ArticleController::class,"index"]);
Route::get('/admin', [AdminController::class,"index"]);
Route::post('/login', [AdminController::class,"login"]);
Route::get('/deconnexion', [AdminController::class,"deconnexion"]);
Route::post('/article', [ArticleController::class,"store"]);

Route::get('/article/{id}-{text}', [ArticleController::class,"show"]);

Route::get('/article/update/{id}', [ArticleController::class,"edit"]);
Route::post('/article/update/{id}', [ArticleController::class,"update"]);
Route::get('/article/delete/{id}', [ArticleController::class,"destroy"]);
Route::get('/article/create', [ArticleController::class,"create"]);
