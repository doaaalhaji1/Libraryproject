<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;



Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/update-photo', [ProfileController::class, 'updateProfileInformation'])->name('profile.update-photo');

});


// ------------------------------auth----------------------------------------

Route::get('/dashboard', function () {
    return view('layouts.Admindashboard');
})->middleware(['auth', 'role.redirect'])->name('dashboard');


Route::middleware(['auth'])->group (function () {
Route::get('/Library', [BookController::class,'availableBooks'])->name('page_books');});
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');


// -----------------------------role(admin)----------------------------------------


Route::middleware(['auth','chekrole:admin'])->group (function () {

    Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class,'index'])->name('users');
    Route::put('users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
   });



// ------------------------------------role (admin and employee)--------------------------------------------

Route::middleware(['auth','chekrole:admin,employee'])->group (function () {

    Route::get('/books/create', [BookController::class,'create'])->name('books.create');
    Route::post('/books', [BookController::class,'store'])->name('books.store');

    Route::get('/books/{book}', [BookController::class,'show'])->name('books.sho');


    Route::get('/books', [BookController::class,'index'])->name('books');

    Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('books.edit');//{id الكتاب}
    Route::put('/books/{book}', [BookController::class,'update'])->name('books.update');//{id الكتاب}

    Route::delete('/books/{book}', [BookController::class,'destroy'])->name('books.destroy');//{id الكتاب}
      //  عرض الكتب المحجوزة
    Route::get('/reservedbooks', [BookController::class,'Reserved_Books_Data'])->name('revrese_books_data');

    Route::get('/books/search/emp', [BookController::class, 'searchemploy'])->name('books.searchemploy');

// ------------------------------------------------------------

    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');

    Route::get('/categories', [CategoryController::class,'index'])->name('categories');

    Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class,'update'])->name('categories.update');

    Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');
 //-------------------------------------------------------------------------

    Route::get('/authors/create', [AuthorController::class,'create'])->name('authors.create');
    Route::post('/authors', [AuthorController::class,'store'])->name('authors.store');

    Route::get('/authors', [AuthorController::class,'index'])->name('authors');

    Route::get('/authors/{author}/edit', [AuthorController::class,'edit'])->name('authors.edit');
   Route::put('/authors/{author}', [AuthorController::class,'update'])->name('authors.update');

   Route::delete('/authors/{author}', [AuthorController::class,'destroy'])->name('authors.destroy');

// ------------------------------------------------------------------------------------------------------

    Route::get('/reservation', [ReservationController::class,'index'])->name('reservation');

    Route::put('/reservation/{reservation}/approve', [ReservationController::class,'approve'])->name('aprove');

    Route::put('/reservation/{reservation}/reject', [ReservationController::class,'reject'])->name('rject');

    Route::put('/reservation/{reservation}/reject', [ReservationController::class,'reject'])->name('rject');


    Route::get('/retunbooks', [BookController::class,'index_retun_books'])->name('return_book');

    Route::put('/retunbooks/{book}', [ReservationController::class,'returnemployee'])->name('return_employee');

});


// ----------------------------------------------user----------------------------------------

Route::middleware(['auth'])->group(function () {

   Route::get('/reservation/create/{book}/book', [ReservationController::class,'create'])->name('book_reservation');
   Route::post('/reservation', [ReservationController::class,'store'])->name('reservations.store');
    // عرض فورم جميع الكتب المتاحة  للحجز
   Route::get('/reservation/books', [ReservationController::class,'create_books_reservation'])->name('books_reservation');
   Route::post('/reservation-books', [ReservationController::class,'store_books_reservation'])->name('storbooks_reservation');

   Route::get('/mybooks', [BookController::class,'mybooks'])->name('mybook_user');
   Route::get('/books/{book}', [BookController::class,'show'])->name('books.sho');

   Route::get('book/{book}', [ReservationController::class,'returnuser'])->name('return_run');
});





Route::get('/set-locale', function (Illuminate\Http\Request $request) {
    $locale = $request->query('locale');

    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }

    return redirect()->back();
})->name('setLocale');


require __DIR__.'/auth.php';


Route::get('/test-db', function () {
    $books = Book::all();
    $users = User::all();
    $authors = Author::all();
    $categories = Category::all();
    $reservations = Reservation::all();

    echo "<h3>Books</h3>";
    foreach ($books as $book) {
        echo "Title: " . $book->title . "<br>";

        // عرض صورة الكتاب إذا كانت موجودة
        if ($book->image) {
            echo "<img src='" . Storage::url($book->image) . "' alt='Book Image' width='100'><br>";
        } else {
            echo "No image available.<br>";
        }

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

        // عرض صورة المستخدم إذا كانت موجودة
        if ($user->image) {
            echo "<img src='" . Storage::url($user->image) . "' alt='User Image' width='100'><br>";
        } else {
            echo "No image available.<br>";
        }

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

                // عرض صورة الكتاب في الحجز إذا كانت موجودة
                if ($book->image) {
                    echo "<img src='" . Storage::url($book->image) . "' alt='Book Image' width='100'><br>";
                }
            }
        } else {
            echo "No books found.<br>";
        }

        echo "Employee name: <br>";
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









