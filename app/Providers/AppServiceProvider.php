<?php

namespace App\Providers;

use Gate;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('create_book', function(User $user){
            return $user->role === 'admin';
        });

        Gate::define('borrow', function(User $user, Book $book) {
            $books = $user->borrowedBooks();
            return $books->where('book_id', '=', $book->id)->count() === 0 && 
                   $book->quantity > 0;
        });
    }
}
