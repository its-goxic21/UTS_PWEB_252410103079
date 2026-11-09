<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login'])->name('login');

Route::get('/login', [PageController::class, 'login']);

Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->name('dashboard');

Route::get('/profile', [PageController::class, 'profile'])
    ->name('profile');

Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])
    ->name('pengelolaan');
