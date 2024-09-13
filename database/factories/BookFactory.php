<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence,
            'language' => $this->faker->randomElement(['English', 'Arabic', 'French']),
            'description' => $this->faker->paragraph(2),
            'book_content' => fake()->paragraph(2),
            'status' => 'available',
            'image' => $this->faker->imageUrl(640, 480, 'books', true, 'Faker'),
        ];
    }
}
