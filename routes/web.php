<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
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
Route::get('/shoping-cart', [MyController::class, 'addtoCart']);
Route::get('/productDetail', [MyController::class, 'productdetails']);
Route::get('/productsearch', [MyController::class, 'productsearch']);
Route::get('/{page?}', [MyController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
