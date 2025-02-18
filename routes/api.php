<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;

// NOT AUTH
Route::get('/', [HomeController::class, 'api']);

Route::post('/register', [RegisteredUserController::class, 'store'])->name('user.store');
Route::post('/login', [AuthController::class, 'store'])->name('user.login');

// AUTH
Route::middleware('auth:sanctum')->group(function () {

    // AUTH
    Route::get('/user', [AuthController::class, 'token'])->name('user.token');
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
});