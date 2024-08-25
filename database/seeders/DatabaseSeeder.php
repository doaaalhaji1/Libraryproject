<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //   User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(10)->create();
        Category::factory(5)->create();
        Author::factory(5)->create();
        Reservation::factory(15)->create()->each(function ($reservation) {
            $books = Book::factory(rand(1, 5))->create();
            foreach ($books as $book) {
                $book->reservation_id = $reservation->id;
                $book->status = 'pending';
                $book->save();
                $authors = Author::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $book->authors()->attach($authors);
                $book->categories()->attach($categories);
            }

            if ($reservation->status === 'approved') {
                foreach ($books as $book) {
                    $book->status = 'reserved';
                    $book->save();
                }
            } elseif ($reservation->status === 'rejected') {
                foreach ($books as $book) {
                    $book->status = 'available';
                    $book->save();
                }
            } else {
                foreach ($books as $book) {
                    $book->status = 'pending';
                    $book->save();
                }
            }

            $user = User::where('role', 'member')->inRandomOrder()->first();
            $reservation->user_id = $user->id;
            $reservation->save();
            $employee = User::where('role', 'employee')->inRandomOrder()->first();
            $reservation->employee_id = $employee->id;
            $reservation->save();
        });

        Book::factory(5)->create();
    }
}
