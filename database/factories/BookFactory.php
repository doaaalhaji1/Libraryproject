<?php

namespace Database\Factories;
use App\Models\Category; // تأكد من إضافة هذا السطر
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
            'book_content' => fake()->paragraph(3),
            'status' => 'available',
            'category_id' => Category::inRandomOrder()->first()->id,
            // 'reservation_id' => null
        ];
    }
}
