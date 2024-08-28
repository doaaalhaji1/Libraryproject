<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function insert(Request $request)
    {
        $DataBook = $request->validate([
            'title' => 'required|min:3|max:100|unique:books',
            'description' => 'required|min:15|max:100',
            'language' => 'required|min:3|max:15',
            'category' => 'required|min:5|max:30',
            'author' => 'required|min:5|max:30',
        ]);

        $author = Author::where('name', $DataBook['author'])->first();
        $category = Category::where('name', $DataBook['category'])->first();

        if (!$author) {
            return response()->json(['error' => '  author not exist'], 404);
        }
        if (!$category) {
            return response()->json(['error' => 'category not exist'], 404);
        }
        $newBook = Book::create([
            'title' => $DataBook['title'],
            'description' => $DataBook['description'],
            'language' => $DataBook['language']
        ]);
        if ($newBook) {
            $newBook->authors()->attach($author->id);
            $newBook->categories()->attach($category->id);
        }
        return response()->json([
            'book' => $newBook->load('categories', 'authors')
        ]);
    }


    public function update(Request $request, Book $book)
    {
        $DataBook = $request->validate([
            'title' => 'required|min:3|max:100|unique:books,title,' . $book->id,
            'description' => 'required|min:15|max:100',
            'language' => 'required|min:3|max:15',
            'category' => 'required|min:5|max:30',
            'author' => 'required|min:5|max:30',
        ]);

        $author = Author::where('name', $DataBook['author'])->first();
        $category = Category::where('name', $DataBook['category'])->first();

        if (!$author) {
            return response()->json(['error' => 'author not exist'], 404);
        }
        if (!$category) {
            return response()->json(['error' => 'category not exist'], 404);
        }
        $book->update([
            'title' => $DataBook['title'],
            'description' => $DataBook['description'],
            'language' => $DataBook['language']
        ]);
        $book->authors()->detach();
        $book->categories()->detach();

        $book->authors()->attach($author->id);
        $book->categories()->attach($category->id);

        return response()->json([
            'book' => $book->load('categories', 'authors')
        ]);
    }


    public function delete(string $id)
    {
        //delete and detach category and author

    }



    public function bookAndCategory()
    {
        $books = Book::with('categories')->get();
        return response()->json($books);
    }
}
