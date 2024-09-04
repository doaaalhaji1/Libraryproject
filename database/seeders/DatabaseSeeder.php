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
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@com',
            'password' => bcrypt('11111111'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'member User',
            'email' => 'member@com',
            'password' => bcrypt('22222222'),
            'role' => 'member',
        ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            ReservationSeeder::class,
        ]);

    }
}
