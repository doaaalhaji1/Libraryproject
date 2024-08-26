<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();

        // تأكد من أن جميع التواريخ في القائمة هي كائنات Carbon
        foreach ($authors as $author) {
            if ($author->birthdate && is_string($author->birthdate)) {
                $author->birthdate = Carbon::parse($author->birthdate);
            }
        }


        return view('authors.index', compact('authors'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birthdate' => 'required|date',
        ]);

        // حفظ البيانات
        Author::create([
            'name' => $request->name,
            'description' => $request->description,
            'nationality' => $request->nationality,
            'birthdate' => $request->birthdate,
        ]);


        return redirect()->route('authors')
                         ->with('success', __('public.author_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
            'nationality' => 'required|string|max:255',
            'birthdate' => 'required|date',
        ]);

        // حفظ البيانات
        $author->update([
            'name' => $request->name,
            'description' => $request->description,
            'nationality' => $request->nationality,
            'birthdate' => $request->birthdate,
        ]);

        return redirect()->route('authors')
                         ->with('success', __('public.author_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors')
                         ->with('success', __('public.author_deleted'));
    }
}


