<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('login', [PageController::class, 'showLogin'])->name('login');
Route::get('register', [PageController::class, 'showRegister'])->name('register');
Route::get('/', [PageController::class, 'showWelcome'])->name('welcome');
