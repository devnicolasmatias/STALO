<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TransactionController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [WelcomeController::class, 'index'])
    ->middleware('auth')
    ->name('welcome');

Route::middleware('auth')->group(function () {
    Route::resource('transactions', TransactionController::class);
});
