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
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(1), // وصف المؤلف
            'nationality' => $this->faker->country(), // جنسية المؤلف
            'birthdate' => $this->faker->date(), // تاريخ ميلاد المؤلف
        ];
    }
}
