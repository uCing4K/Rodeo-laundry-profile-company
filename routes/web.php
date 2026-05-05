<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
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
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');