<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\OperatingHourController;
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

        Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

        Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
        Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
        Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
        Route::post('/operating-hours', [\App\Http\Controllers\Admin\OperatingHourController::class, 'store'])->name('operating-hours.store');
        Route::put('/operating-hours/{operatingHour}', [\App\Http\Controllers\Admin\OperatingHourController::class, 'update'])->name('operating-hours.update');
        Route::delete('/operating-hours/{operatingHour}', [\App\Http\Controllers\Admin\OperatingHourController::class, 'destroy'])->name('operating-hours.destroy');
        
        Route::post('/service-types', [\App\Http\Controllers\Admin\ServiceTypeController::class, 'store'])->name('service-types.store');
        Route::put('/service-types/{serviceType}', [\App\Http\Controllers\Admin\ServiceTypeController::class, 'update'])->name('service-types.update');
        Route::delete('/service-types/{serviceType}', [\App\Http\Controllers\Admin\ServiceTypeController::class, 'destroy'])->name('service-types.destroy');

        Route::post('/service-categories', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'store'])->name('service-categories.store');
        Route::put('/service-categories/{serviceCategory}', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'update'])->name('service-categories.update');
        Route::delete('/service-categories/{serviceCategory}', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'destroy'])->name('service-categories.destroy');
        Route::post('/service-categories/{serviceCategory}/toggle-popular', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'togglePopular'])->name('service-categories.toggle-popular');

        Route::put('/settings', [\App\Http\Controllers\Admin\CompanySettingController::class, 'update'])->name('settings.update');
    });
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');