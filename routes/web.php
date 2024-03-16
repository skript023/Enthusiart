<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ArtworkController;

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

/*
|--------------------------------------------------------------------------
| Route Command
|--------------------------------------------------------------------------
|
| routes that only call controller to query some required data
|
*/
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/auth/register', [UserController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Route View
|--------------------------------------------------------------------------
|
| routes that only show view data either from controller or call view directly
|
*/
Route::get('/', fn () => view('index'));
Route::get('/about', fn () => view('about'));
Route::get('/contact', fn ()=> view('contact'));
Route::get('/login', fn () => view('login'))->name('login');
Route::get('/register', fn() => view('register'));

Route::get('/favorite', fn() => view('favorite'));
Route::group(['middleware' => ['auth']], function () {
    /*
    |--------------------------------------------------------------------------
    | Route Command Under Middleware
    |--------------------------------------------------------------------------
    |
    | routes that only call controller to query some required data
    |
    */
    Route::get('/myartwork', [ArtworkController::class, 'myArtworks']);
    Route::get('/auth/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/artwork/upload', [ArtworkController::class, 'upload']);
    Route::patch('/user/update/{id}', [UserController::class,'update']);

    /*
    |--------------------------------------------------------------------------
    | Route View Under Middleware
    |--------------------------------------------------------------------------
    |
    | routes that only show view data either from controller or call view directly
    |
    */
    Route::get('/upload', fn() => view('upload'));
    Route::get('/gallery', [GalleryController::class, 'index']);
});
