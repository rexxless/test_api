<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login'])
    ->middleware('throttle:login');

Route::post('register', [AuthController::class, 'register'])
    ->middleware('throttle:api');

// Protected routes (require authentication)
Route::middleware(['auth:api'])->group(function () {

    // Hotels routes
    Route::prefix('hotels')->group(function () {
        Route::get('/', [HotelController::class, 'index'])
            ->middleware('throttle:api');
        Route::get('/{hotel}', [HotelController::class, 'show'])
            ->middleware('throttle:api');
        Route::post('/', [HotelController::class, 'store'])
            ->middleware('throttle:heavy');
        Route::patch('/{hotel}', [HotelController::class, 'update'])
            ->middleware('throttle:heavy');
        Route::delete('/{hotel}', [HotelController::class, 'destroy'])
            ->middleware('throttle:heavy');
    });

    // Logout route
    Route::get('logout', [AuthController::class, 'logout'])
        ->middleware('throttle:api');
});
