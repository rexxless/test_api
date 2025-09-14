<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function () {
    Route::prefix('hotels')->group(function () {
        Route::get('/', [HotelController::class, 'index']);
        Route::get('/{hotel}', [HotelController::class, 'show']);
        Route::post('/', [HotelController::class, 'store']);
        Route::patch('/{hotel}', [HotelController::class, 'update']);
        Route::delete('/{hotel}', [HotelController::class, 'destroy']);
    });
});

Route::middleware('auth:api')->get('logout', [AuthController::class, 'logout']);
