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
            'book_content' => 'min:5|max:100',
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
            'language' => $DataBook['language'],
            'book_content' => $DataBook['book_content'],

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
        $validated = $request->validate([
            'title' => 'min:3|max:100|unique:books,title,' . $book->id,
            'description' => 'min:15|max:100',
            'language' => 'min:3|max:15',
            'book_content' => 'min:5|max:100',
            'author' => 'min:5|max:30',
            'category' => 'min:5|max:30',
        ]);

        $author = Author::where('name', $validated['author'])->first();
        $category = Category::where('name', $validated['category'])->first();

        if (!$author) {
            return response()->json(['error' => '  author not exist'], 404);
        }
        if (!$category) {
            return response()->json(['error' => 'category not exist'], 404);
        }
        $book->update($validated);

        if ($request->has('author')) {
            $author = Author::where('name', $request->author)->first();

            if ($author) {
                $book->authors()->sync([$author->id]);
            } else {
                $book->authors()->detach();
            }
        }

        if ($request->has('category')) {
            $category = Category::where('name', $request->category)->first();

            if ($category) {
                $book->categories()->sync([$category->id]);
            } else {
                $book->categories()->detach();
            }
        }

        return response()->json([
            'message' => 'updated successfully',
            'book' => $book->load('categories', 'authors')
        ]);
    }






    public function delete(Book $book)
    {
        $book->categories()->detach();
        $book->authors()->detach();
        $book->delete();
        return response()->json([
            'message' => 'deleted successfully'
        ]);

    }

    public function bookAndCategory()
    {
        $books = Book::with('categories')->get();
        return response()->json($books);
    }

    public function show(Book $book)
    {
        return response()->json($book);
    }

    public function availableBooks()
    {
        $books = Book::where('status','available')->get();
        return response()->json($books);
    }
}
