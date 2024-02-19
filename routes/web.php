<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;

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

//Route Command
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/auth/register', [UserController::class, 'store']);
//Route Views
Route::get('/', fn () => view('index'));
Route::get('/about', fn () => view('about'));
Route::get('/contact', fn ()=> view('contact'));
Route::get('/login', fn () => view('login'))->name('login');
Route::get('/register', fn() => view('register'));

Route::group(['middleware' => ['auth']], function () {
    Route::get('/gallery', [GalleryController::class, 'index']);
});