<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/games', [GameController::class, 'index'])
    ->name('games.index');

Route::get('/games/{id}', [GameController::class, 'show'])
    ->name('games.show');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/profile', [ProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.edit');

Route::patch('/profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');

Route::get('/wishlist', [WishlistController::class, 'index'])
    ->middleware('auth')
    ->name('wishlist.index');

Route::post('/wishlist', [WishlistController::class, 'store'])
    ->middleware('auth')
    ->name('wishlist.store');

Route::patch('/wishlist/{wishlist}/status', [WishlistController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('wishlist.updateStatus');

Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])
    ->middleware('auth')
    ->name('wishlist.destroy');

Route::get('/forum', [ForumController::class, 'index'])
    ->middleware('auth')
    ->name('forum.index');

Route::post('/forum', [ForumController::class, 'store'])
    ->middleware('auth')
    ->name('forum.store');

Route::delete('/forum/{comment}', [ForumController::class, 'destroy'])
    ->middleware('auth')
    ->name('forum.destroy');