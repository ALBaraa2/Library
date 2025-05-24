<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'bio' => $this->faker->text(250), // Bio limited to 250 characters
            'contact_info' => $this->faker->email,
            'birth_date' => $this->faker->date(),
            'nationality' => $this->faker->country,
            'website' => $this->faker->url,
            'awards' => $this->faker->sentence(10), // Shortened awards description
        ];

    }
}
