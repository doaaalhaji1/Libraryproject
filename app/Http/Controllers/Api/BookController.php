<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
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
        $DataBook =$request->validate([
            'title' => 'required|min:3|max:100|unique:books',
            'description' => 'required|min:15|max:100',
            'language' => 'required|min:3|max:15',
            'category' => 'required|min:5|max:30',
            'author' => 'required|min:5|max:30',

        ]);

        $newBook = Book::create($DataBook);
        //new author
        //new category
        return response()->json($newBook);

    }

    public function update(Request $request, string $id)
    {
        $DataBook =$request->validate([
            'title' => 'required|min:3|max:100|unique:books',
            'description' => 'required|min:15|max:100',
            'language' => 'required|min:3|max:15',
            'category' => 'required|min:5|max:30',
            'author' => 'required|min:5|max:30',
        ]);
        //update book
        //update author
        //update category

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
