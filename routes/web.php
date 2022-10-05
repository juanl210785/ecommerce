<?php

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::post('products/{product}', [ProductController::class, 'carrito'])->name('products.carrito');

Route::put('products/addcarrito/{product}/{order}', [ProductController::class, 'addcarrito'])->name('products.addcarrito');

Route::get('products/orden/{order}', [ProductController::class, 'orden'])->name('products.orden');

Route::delete('products/carrito/remove/{product}/{order}', [ProductController::class, 'destroy'])->name('products.remove');

Route::get('category/{category}', [ProductController::class, 'category'])->name('products.category');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
