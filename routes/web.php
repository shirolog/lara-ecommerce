<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/ecommerce', [ProductController::class, 'redirect'])
->name('redirect');


Route::get('/', [ProductController::class, 'index'])
->name('index');


Route::get('/product', [ProductController::class, 'index'])
->name('admin.index');


Route::post('/upload', [ProductController::class, 'store'])
->name('produt.store');

Route::delete('/showproduct/{product}', [ProductController::class, 'destroy'])
->name('produt.destroy');



Route::get('/updateview/{product}', [ProductController::class, 'edit'])
->name('product.edit');

Route::put('/updateview/{product}', [ProductController::class, 'update'])
->name('product.update');

Route::get('/showproduct', [ProductController::class, 'show'])
->name('admin.show');




