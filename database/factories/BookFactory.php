<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Publisher;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5), // Limit title length
            'author_id' => Author::inRandomOrder()->first()->id,
            'publisher_id' => Publisher::inRandomOrder()->first()->id,
            'description' => $this->faker->text(500), // Limit description to 500 characters
            'genre' => $this->faker->word, // Short single-word genres
            'quantity' => $this->faker->numberBetween(1, 50),
            'isbn' => $this->faker->unique()->isbn13,
            'publication_date' => $this->faker->date(),
            'language' => $this->faker->languageCode, // Short language codes
            'total_pages' => $this->faker->numberBetween(50, 1000),
        ];

    }
}
