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
    Route::resource('authors', AuthorController::class)->except(['edit', 'update', 'destroy']);
    Route::resource('books.reviews', ReviewController::class)
        ->scoped(['review' => 'id'])
        ->only(['create', 'store']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('profile')->group(function () {
        Route::get('{user:name}', [UserController::class, 'show'])->name('user.show')
        ->can('view', 'user');
        Route::get('{user:name}/edit', [UserController::class, 'edit'])->name('user.edit')
        ->can('update', 'user');
        Route::put('{user:name}', [UserController::class, 'update'])->name('user.update');
        Route::delete('{user:name}', [UserController::class, 'destroy'])->name('user.destroy')
        ->can('delete', 'user');
    });

    Route::delete('books/{book}/reviews/{review}', [ReviewController::class, 'destroy'])
    ->name('books.reviews.destroy')
    ->middleware('auth')
    ->can('delete', 'review');

});


Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});
