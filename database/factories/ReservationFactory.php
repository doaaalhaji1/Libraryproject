<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_start_date' => $this->faker->date(),
            'reservation_end_date' => $this->faker->date(),
            'status' => 'pending',
            'book_id' => Book::inRandomOrder()->first()->id,
            'user_id' => User::where('role', 'member')->inRandomOrder()->first()->id,
            'employee_id' => User::where('role', 'employee')->inRandomOrder()->first()->id,
            'recipient_user_id' => User::where('role', 'employee')->inRandomOrder()->first()->id,


        ];
    }
}
