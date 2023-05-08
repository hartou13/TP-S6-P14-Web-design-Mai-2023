<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;

use App\Models\MymeType;

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
Route::get('/search', [ArticleController::class,"recherche"]);
Route::get('/admin', [AdminController::class,"index"]);
Route::post('/login', [AdminController::class,"login"]);
Route::get('/deconnexion', [AdminController::class,"deconnexion"]);
Route::post('/article', [ArticleController::class,"store"]);

Route::get('/article/{id}-{text}', [ArticleController::class,"show"]);

Route::get('/article/update/{id}', [ArticleController::class,"edit"]);
Route::post('/article/update/{id}', [ArticleController::class,"update"]);
Route::get('/article/delete/{id}', [ArticleController::class,"destroy"]);
Route::get('/article/create', [ArticleController::class,"create"]);

Route::middleware('cache.headers:public;max_age=3600;etag')->group(function () {
    Route::get('/styles/{any}', function ($mylink) {
        $path = 'style/' . $mylink;
        dd($mylink);
        $path=str_replace('/','\\',$path);
        if (File::exists(($path))) {
            $contentType=(new MymeType())->mime_type($path);
            $response = new Illuminate\Http\Response(File::get(($path)), 200);
            $response->header('Content-Type', $contentType);
            return $response;
        } else {
            abort(404);
        }
    })->where('any', '.*');
});

