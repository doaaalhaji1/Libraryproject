<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = User::where('role', 'employee')->get();
        $members = User::where('role', 'member')->get();

        for ($i = 0; $i < 5; $i++) {
            $books = Book::factory()->count(rand(1, 4))->create();
            $reservation = Reservation::factory()->create([
                'status' => 'pending',
                'user_id' => $members->random()->id,
                'employee_id' => null,
            ]);

            foreach ($books as $book) {
                $book->reservation_id = $reservation->id;
                $book->save();
            }
        }

        for ($i = 0; $i < 5; $i++) {
            $books = Book::factory()->count(rand(1, 4))->create();
            $reservation = Reservation::factory()->create([
                'status' => 'approved',
                'user_id' => $members->random()->id,
                'employee_id' => $employees->random()->id,
            ]);

            foreach ($books as $book) {
                $book->reservation_id = $reservation->id;
                $book->save();
            }
        }

        for ($i = 0; $i < 5; $i++) {
            $books = Book::factory()->count(rand(1, 4))->create();
            $reservation = Reservation::factory()->create([
                'status' => 'approved',
                'user_id' => $members->random()->id,
                'employee_id' => $employees->random()->id,
                'recipient_user_id' => $employees->random()->id,
            ]);

            foreach ($books as $book) {
                $book->reservation_id = $reservation->id;
                $book->save();
            }
        }
    }
}
