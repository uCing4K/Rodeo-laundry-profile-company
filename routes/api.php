<?php

use App\Http\Controllers\PublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('public')->group(function () {
    Route::get('/faq',             [PublicController::class, 'faq']);
    Route::get('/testimonials',    [PublicController::class, 'testimonials']);
    Route::get('/operating-hours', [PublicController::class, 'operatingHours']);
});