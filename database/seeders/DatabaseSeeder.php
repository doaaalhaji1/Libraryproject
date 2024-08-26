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
        Book::factory(10)->create()->each(function ($book) {
            $authors = Author::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $book->authors()->attach($authors);

            $categories = Category::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $book->categories()->attach($categories);
        });
        $employees = User::where('role', 'employee')->get();
        $members = User::where('role', 'member')->get();
        Reservation::factory(15)->create()->each(function ($reservation) use ($employees, $members) {

            $employeeForApproval = $employees->random();
            $employeeForReceiving = $employees->random();
            $member = $members->random();
            $books = Book::inRandomOrder()->take(rand(1, 3))->get();
            $reservation->user_id = $member->id;
            $reservation->employee_id = $employeeForApproval->id;
            $reservation->recipient_user_id = $employeeForReceiving->id;
            $reservation->save();

            foreach ($books as $book) {
                $book->reservation_id = $reservation->id;
                $book->save();
            }
        });
    }
}
