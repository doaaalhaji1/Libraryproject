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
        // إنشاء مستخدم إداري
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@com',
            'password' => '11111111',
            'role' => 'admin',
        ]);

        // إنشاء مستخدمين عشوائيين
        User::factory(10)->create();

        // إنشاء الفئات
        Category::factory(5)->create();

        // إنشاء المؤلفين
        Author::factory(5)->create();

        // إنشاء الكتب وربطها بالمؤلفين والفئات
        Book::factory(10)->create()->each(function ($book) {
            // ربط الكتاب بمؤلفين عشوائيين
            $authors = Author::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $book->authors()->attach($authors);

            // ربط الكتاب بفئات عشوائية
            $categories = Category::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $book->categories()->attach($categories);

            // تعيين أول فئة كـ category_id
            if ($categories->isNotEmpty()) {
                $book->category_id = $categories->first();
            } else {
                // تعيين فئة افتراضية إذا لم توجد أي فئات مرتبطة
                $book->category_id = Category::factory()->create()->id;
            }

            $book->save();
        });

        // الحصول على الموظفين والأعضاء
        $employees = User::where('role', 'employee')->get();
        $members = User::where('role', 'member')->get();

        // إنشاء الحجوزات وربطها بالمستخدمين والكتب
        Reservation::factory(15)->create()->each(function ($reservation) use ($employees, $members) {

            // تعيين موظف واحد كموافق على الحجز وموظف واحد كمستلم
            $employeeForApproval = $employees->random();
            $employeeForReceiving = $employees->random();

            // تعيين المستخدم الذي قام بالحجز
            $member = $members->random();

            // اختيار مجموعة من الكتب عشوائياً للحجز
            $books = Book::inRandomOrder()->take(rand(1, 3))->get();

            // تحديث بيانات الحجز
            $reservation->user_id = $member->id;
            $reservation->employee_id = $employeeForApproval->id;
            $reservation->recipient_user_id = $employeeForReceiving->id;
            $reservation->save();

            // ربط الكتب بالحجز
            foreach ($books as $book) {
                $book->reservation_id = $reservation->id;
                $book->save();
            }
        });
    }
}
