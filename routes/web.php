<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('layouts.Admindashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group (function () {
    Route::get('/books/create', [BookController::class,'create']);
    Route::post('/books', [BookController::class,'store'])->name('books.store');
    Route::get('/books/create', [BookController::class,'create'])->name('books.create');


    Route::get('/books', [BookController::class,'index'])->name('books');

    Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('books.edit');//{id الكتاب}
    Route::put('/books/{book}', [BookController::class,'update'])->name('books.update');//{id الكتاب}

    Route::delete('/books/{book}', [BookController::class,'destroy'])->name('books.destroy');//{id الكتاب}


});







Route::get('/set-locale', function (Illuminate\Http\Request $request) {
    $locale = $request->query('locale');

    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }

    return redirect()->back();
})->name('setLocale');



Route::get('/test-db', function () {
    $books = Book::all();
    $users = User::all();
    $authors = Author::all();
    $categories = Category::all();
    $reservations = Reservation::all();

    echo "<h3>Books</h3>";
    foreach ($books as $book) {
        echo "Title: " . $book->title . "<br>";
        echo "Authors: <br>";
        if ($book->authors->isNotEmpty()) {
            foreach ($book->authors as $author) {
                echo "- " . $author->name . "<br>";
            }
        } else {
            echo "No authors found.<br>";
        }

        echo "Categories: <br>";
        if ($book->categories->isNotEmpty()) {
            foreach ($book->categories as $category) {
                echo "- " . $category->name . "<br>";
            }
        } else {
            echo "No categories found.<br>";
        }

        echo "Language: " . $book->language . "<br>";
        echo "Status: " . $book->status . "<br>";
        echo "-----------------------------------------------<br>";
    }

    echo "<h3>Users</h3>";
    foreach ($users as $user) {
        echo "Name: " . $user->name . "<br>";
        echo "Email: " . $user->email . "<br>";
        echo "Role: " . $user->role . "<br>";
        echo "----------------------------------------------<br>";
    }

    echo "<h3>Authors</h3>";
    foreach ($authors as $author) {
        echo "Name: " . $author->name . "<br>";
        echo "----------------------------------------------<br>";
    }

    echo "<h3>Categories</h3>";
    foreach ($categories as $category) {
        echo "Name: " . $category->name . "<br>";
        echo "--------------------------------------------<br>";
    }

    echo "<h3>Reservations</h3>";
    foreach ($reservations as $reservation) {
        echo "Books: <br>";
        if ($reservation->books->isNotEmpty()) {
            foreach ($reservation->books as $book) {
                echo "- " . $book->title . "<br>";
            }
        } else {
            echo "No books found.<br>";
        }

        echo "Employees name: <br>";
        if ($reservation->employee) {
            echo "- " . $reservation->employee->name . "<br>";
        } else {
            echo "No employee found.<br>";
        }

        echo "Recipient name: <br>";
        if ($reservation->recipient) {
            echo "- " . $reservation->recipient->name . "<br>";
        } else {
            echo "No recipient found.<br>";
        }

        echo "Member: " . ($reservation->user ? $reservation->user->name : 'None') . "<br>";
        echo "Reservation Start Date: " . $reservation->reservation_start_date . "<br>";
        echo "Reservation End Date: " . $reservation->reservation_end_date . "<br>";
        echo "Status: " . $reservation->status . "<br>";
        echo "--------------------------------------------<br>";
    }
});






require __DIR__.'/auth.php';
