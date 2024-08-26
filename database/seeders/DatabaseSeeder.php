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

        // إنشاء الفئات
        $categories = Category::factory(5)->create();

        // إنشاء المؤلفين
        $authors = Author::factory(5)->create();

        // إنشاء الحجوزات
        Reservation::factory(15)->create()->each(function ($reservation) use ($authors, $categories) {
            // إنشاء الكتب المرتبطة بكل حجز
            $books = Book::factory(rand(1, 5))->create(['reservation_id' => $reservation->id]);

            foreach ($books as $book) {
                // تحديث حالة الكتاب إلى "pending"
                $book->status = 'pending';
                $book->save();

                // ربط الكتاب بالمؤلفين (many-to-many)
                $book->authors()->attach($authors->random(rand(1, 3))->pluck('id')->toArray());

                // ربط الكتاب بالفئات (many-to-many)
                $book->categories()->attach($categories->random(rand(1, 2))->pluck('id')->toArray());
            }
        });

        // إنشاء العلاقة many-to-many بين الموظفين والحجوزات
        $employees = User::where('role', 'employee')->get();
        Reservation::all()->each(function ($reservation) use ($employees) {
            $reservation->employees()->attach($employees->random(rand(1, 3))->pluck('id')->toArray());
        });

        // إنشاء كتب إضافية غير مرتبطة بحجوزات (اختياري)
        Book::factory(5)->create()->each(function ($book) use ($authors, $categories) {
            // ربط الكتاب بالمؤلفين (many-to-many)
            $book->authors()->attach($authors->random(rand(1, 3))->pluck('id')->toArray());

            // ربط الكتاب بالفئات (many-to-many)
            $book->categories()->attach($categories->random(rand(1, 2))->pluck('id')->toArray());
        });
    }
}
