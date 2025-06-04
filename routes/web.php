<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class)->except('index');
    Route::resource('authors', AuthorController::class);
    Route::resource('books.reviews', ReviewController::class)
        ->scoped(['review' => 'id'])
        ->only(['create', 'store', 'destroy']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('{user:name}', [UserController::class, 'show'])->name('users.show');
    Route::get('{user:name}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('{user:name}', [UserController::class, 'destroy'])->name('users.destroy');
});


Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});
