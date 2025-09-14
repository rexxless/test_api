<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::post('login', [AuthController::class, 'login'])->middleware('throttle:login');
Route::post('register', [AuthController::class, 'register'])->middleware('throttle:login');;

Route::middleware(['auth:api'])->group(function () {
    Route::prefix('hotels')->group(function () {
        Route::get('/', [HotelController::class, 'index'])->middleware('throttle:api');
        Route::get('/{hotel}', [HotelController::class, 'show'])->middleware('throttle:api');;
        Route::post('/', [HotelController::class, 'store'])->middleware('throttle:heavy');;
        Route::patch('/{hotel}', [HotelController::class, 'update'])->middleware('throttle:heavy');;
        Route::delete('/{hotel}', [HotelController::class, 'destroy'])->middleware('throttle:heavy');;
    });
});

Route::middleware('auth:api')->get('logout', [AuthController::class, 'logout'])->middleware('throttle:api');
