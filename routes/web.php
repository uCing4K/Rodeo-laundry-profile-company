<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'index'])->name('index');

Route::redirect('/login', '/admin')->name('login');

Route::get('/about', [WebController::class, 'about'])->name('about');

Route::get('/services', [WebController::class, 'services'])->name('services');

Route::get('/contact', [WebController::class, 'contact'])->name('contact');

Route::get('/tracking', [WebController::class, 'tracking'])->name('tracking');

Route::get('/faq', [WebController::class, 'faq'])->name('faq');

Route::get('/testimonials', [WebController::class, 'testimonials'])->name('testimonials');

Route::get('/operating-hours', [WebController::class, 'operatingHours'])->name('operating-hours');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('index');
        Route::post('/', [AdminAuthController::class, 'login'])->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');