<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   // عرض جميع الكتب للمدير او الموظف
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function availableBooks()
    {
        // عرض الكتب المتاحة فقط للمستخدمين
        $books = Book::where('status', 'available')->get();
        return view('books.available', compact('books'));
    }
    public function reservedBooks()
    {
        // عرض الكتب المحجوزة فقط من اجل توثيق الاستعادة
        $books = Book::where('status', 'reserved')->get();
        return view('books.reserved', compact('books'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ارسال المجموعات والمالكين من اجل سهولة الاختيار
        $categories = Category::all();
        $authors=Author::all();

        return view('books.create', compact('categories','authors'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'language' => 'required|string|max:255',
        'bookdescription' => 'required|string|max:255',
        'bookcontent' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('book_images', 'public');
    }


    Book::create([
        'title' => $request->title,
        'language' => $request->language,
        'description' => $request->bookdescription,
        'book_content' => $request->bookcontent,
        'image' => $imagePath,
    ]);

        // return redirect()->route('books.index')->with('success', __('public.book_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {   $categories = Category::all();
        $author=Author::all();
        return view('books.show', compact('book'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors=Author::all();

        return view('books.edit', compact('book','categories','authors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'bookdescription' => 'required|string|max:255',
            'bookcontent' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        Book::update([
            'title' => $request->title,
            'language' => $request->language,
            'description' => $request->bookdescription,
            'book_content' => $request->bookcontent,
            'image' => $imagePath,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', __('public.book_deleted'));
    }
}
