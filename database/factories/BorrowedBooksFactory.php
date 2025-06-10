<?php

namespace Database\Factories;
use App\Models\Book;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BorrowedBooks>
 */
class BorrowedBooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return[
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'borrowed_at' => $this->faker->dateTimeBetween('-30 days', now()),
            'due_date' => $this->faker->dateTimeBetween(now(), '+30 days'),
            'status' => $this->faker->randomElement(['borrowes', 'returned', 'overdue']),
        ];
    }
}
