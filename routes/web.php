<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books.reviews', ReviewController::class)
    ->scoped(['review' => 'id'])
    ->only(['create', 'store', 'destroy']);


Route::get('login', [AuthController::class, 'showLogin'])->name('show.login');
Route::get('register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');