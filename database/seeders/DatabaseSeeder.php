<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use App\Models\BorrowedBooks;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();

        // Publisher::factory(100)->create();

        // Author::factory(20)->create();

        // Book::factory(50)->create();

        // Review::factory(100)->create();

        BorrowedBooks::factory(100)->create();
    }
}
