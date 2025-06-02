<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\RentalController;
use App\Http\Controllers\Api\PaymentController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('rooms', RoomController::class);

    Route::get('rentals', [RentalController::class, 'index']);
    Route::post('rentals', [RentalController::class, 'store']);
    Route::post('rentals/{rental}/complete', [RentalController::class, 'complete']);

    Route::get('payments', [PaymentController::class, 'index']);
    Route::post('payments', [PaymentController::class, 'store']);
});
