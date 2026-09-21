<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

});


require __DIR__.'/settings.php';



Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');


Route::get('/discover', [ProductController::class, 'discover'])
    ->middleware('auth')
    ->name('products.discover');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::put('/cart/{product}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/{product}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::delete('/cart', [CartController::class, 'clear'])
    ->name('cart.clear');


Route::middleware('auth')->group(function () {

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::post('/orders', [OrderController::class, 'store'])
        ->name('orders.store');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');

});



Route::get('/admin', function () {
    return view('admin.index');
})
    ->middleware(['auth', 'admin'])
    ->name('admin.index');


Route::get('/admin/categories', [CategoryController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.categories.index');

Route::get('/admin/categories/create', [CategoryController::class, 'create'])
    ->middleware(['auth', 'admin'])
    ->name('admin.categories.create');

Route::post('/admin/categories', [CategoryController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('admin.categories.store');

Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->middleware(['auth', 'admin'])
    ->name('admin.categories.edit');

Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])
    ->middleware(['auth', 'admin'])
    ->name('admin.categories.update');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])
    ->middleware(['auth', 'admin'])
    ->name('admin.categories.destroy');


Route::get('/admin/products', [AdminProductController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.products.index');

Route::get('/admin/products/create', [AdminProductController::class, 'create'])
    ->middleware(['auth', 'admin'])
    ->name('admin.products.create');

Route::post('/admin/products', [AdminProductController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('admin.products.store');

Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])
    ->middleware(['auth', 'admin'])
    ->name('admin.products.edit');

Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])
    ->middleware(['auth', 'admin'])
    ->name('admin.products.update');

Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])
    ->middleware(['auth', 'admin'])
    ->name('admin.products.destroy');


Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.users.index');

Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])
    ->middleware(['auth', 'admin'])
    ->name('admin.users.edit');

Route::put('/admin/users/{user}', [UserController::class, 'update'])
    ->middleware(['auth', 'admin'])
    ->name('admin.users.update');

Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth', 'admin'])
    ->name('admin.users.destroy');



Route::delete('/account', [AccountController::class, 'destroy'])
    ->middleware('auth')
    ->name('account.destroy');
Route::get('/admin/users/create', [UserController::class, 'create'])
    ->middleware(['auth', 'admin'])
    ->name('admin.users.create');

Route::post('/admin/users', [UserController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('admin.users.store');
// order routes
Route::get('/admin/orders', [OrderController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.orders.index');

Route::get('/admin/orders/{order}', [OrderController::class, 'show'])
    ->middleware(['auth', 'admin'])
    ->name('admin.orders.show');

Route::put('/admin/orders/{order}', [OrderController::class, 'updateStatus'])
    ->middleware(['auth', 'admin'])
    ->name('admin.orders.update_status');
Route::get('/admin/orders', [OrderController::class, 'adminIndex'])
    ->middleware(['auth', 'admin'])
    ->name('admin.orders.index');

Route::get('/admin/orders/{order}', [OrderController::class, 'adminShow'])
    ->middleware(['auth', 'admin'])
    ->name('admin.orders.show');

Route::put('/admin/orders/{order}', [OrderController::class, 'updateStatus'])
    ->middleware(['auth', 'admin'])
    ->name('admin.orders.update_status');