<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;

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
Route::get('/gallery', [GalleryController::class, 'gallery']);
Route::get('/artwork/{id}', [GalleryController::class,'detail']);

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
    Route::patch('/user/update/{id}', [UserController::class, 'update']);
    Route::patch('/user/password/{id}', [UserController::class, 'update_password']);
    Route::get('/favorite', [FavoriteController::class, 'favorite']);
    Route::post('/favorite/add', [FavoriteController::class, 'create']);
    Route::delete('/favorite/delete/{id}', [FavoriteController::class, 'delete']);
    
    /*
    |--------------------------------------------------------------------------
    | Route View Under Middleware
    |--------------------------------------------------------------------------
    |
    | routes that only show view data either from controller or call view directly
    |
    */
    Route::get('/user/profile', fn() => view('profile'))->name('profile');
});

Route::middleware(['auth', 'role:artist'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Route Command Under Middleware
    |--------------------------------------------------------------------------
    |
    | routes that only call controller to query some required data
    |
    */
    Route::get('/myartwork', [ArtworkController::class, 'myArtworks']);
    Route::post('/artwork/upload', [ArtworkController::class, 'upload']);
    Route::get('/artwork/edit/{id}', [ArtworkController::class, 'edit']);
    Route::patch('/artwork/update/{id}', [ArtworkController::class, 'update']);
    Route::get('/artwork/delete/{id}', [GalleryController::class,'delete']);
    Route::get('/sale', [SaleController::class, 'mySale']);
    Route::get('/sale/order/{id}', [SaleController::class, 'orderDetail']);
    /*
    |--------------------------------------------------------------------------
    | Route View Under Middleware
    |--------------------------------------------------------------------------
    |
    | routes that only show view data either from controller or call view directly
    |
    */
    Route::get('/upload', fn() => view('upload'));
});

Route::middleware(['auth', 'role:art_enthusiast'])->group(function () {
    Route::post('/checkout/{id}', [OrderController::class, 'checkout']);
    Route::post('/order/{id}', [OrderController::class, 'order']);
    Route::get('/payment/success/{id}', [OrderController::class, 'orderSuccess']);
    Route::get('/order/history', [OrderController::class, 'orderHistory']);
    Route::get('/order/invoice/{id}', [OrderController::class, 'invoice']);
    Route::get('/order/{id}/payment', [OrderController::class, 'continuePayment']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/dashboard/user', [AdminController::class, 'user']);
    Route::post('/user/add', [AdminController::class, 'store']);
    Route::get('/user/edit/{id}', [AdminController::class, 'editUser']);
    Route::patch('/user/data/update/{id}', [AdminController::class, 'updateUser']);
    Route::get('/user/remove/{id}', [AdminController::class, 'remove']);
    Route::get('/dashboard/post', [AdminController::class, 'post']);
    Route::post('/post/upload', [AdminController::class, 'upload']);
    Route::get('/post/edit/{id}', [AdminController::class, 'editArtwork']);
    Route::patch('/post/update/{id}', [AdminController::class, 'updateArtwork']);
    Route::get('/post/delete/{id}', [AdminController::class, 'delete']);
    Route::get('/dashboard/order', [AdminController::class, 'order']);
    Route::get('/order/detail/{id}', [AdminController::class, 'detail']);
    
    Route::get('/dashboard/user/add', fn() => view('admin.addUser'));
    Route::get('/dashboard/post/add', fn() => view('admin.uploadArt'));
});