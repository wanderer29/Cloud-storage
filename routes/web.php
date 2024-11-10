<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [PageController::class, 'showLogin'])->name('login');
Route::get('register', [PageController::class, 'showRegister'])->name('register');
Route::get('home', [PageController::class, 'showHome'])->name('home');
Route::get('/', [PageController::class, 'showWelcome'])->name('welcome');


Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
