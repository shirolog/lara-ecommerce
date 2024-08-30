<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Cart;

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

Route::get('/search', [ProductController::class, 'search'])
->name('product.search');


Route::get('/search', [ProductController::class, 'search'])
->name('product.search');

Route::post('/addcart/{product}', [CartController::class, 'store'])
->name('cart.store');

Route::get('/showcart', [CartController::class, 'show'])
->name('cart.show');

Route::delete('/showcart/{cart}', [CartController::class, 'destroy'])
->name('cart.destroy');


Route::post('/order', [OrderController::class, 'store'])
->name('order.store');







