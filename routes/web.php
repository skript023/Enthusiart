<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\OrderController;

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
Route::post('/auth/login', [AuthController::class, 'login']);
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
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/artwork/{id}', [GalleryController::class,'detail']);

// Route::get('/favorite', fn() => view('favorite'));
Route::group(['middleware' => ['auth']], function () {
    /*
    |--------------------------------------------------------------------------
    | Route Command Under Middleware
    |--------------------------------------------------------------------------
    |
    | routes that only call controller to query some required data
    |
    */
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/myartwork', [ArtworkController::class, 'myArtworks']);
    Route::post('/artwork/upload', [ArtworkController::class, 'upload']);
    Route::get('/artwork/edit/{id}', [ArtworkController::class, 'edit']);
    Route::patch('/artwork/update/{id}', [ArtworkController::class, 'update']);
    Route::patch('/user/update/{id}', [UserController::class, 'update']);
    Route::patch('/user/password/{id}', [UserController::class, 'update_password']);
    Route::get('/artwork/delete/{id}', [GalleryController::class,'delete']);
    Route::post('/favorite/add', [FavoriteController::class, 'create']);
    Route::delete('/favorite/delete/{id}', [FavoriteController::class, 'delete']);
    Route::get('/favorite', [FavoriteController::class, 'favorite']);
    Route::get('/checkout/{id}', [OrderController::class, 'checkout']);

    /*
    |--------------------------------------------------------------------------
    | Route View Under Middleware
    |--------------------------------------------------------------------------
    |
    | routes that only show view data either from controller or call view directly
    |
    */
    Route::get('/user/profile', fn() => view('profile'))->name('profile');
    Route::get('/upload', fn() => view('upload'));
    // Route::get('/artwork/edit/{id}', fn() => view('edit'));
});
