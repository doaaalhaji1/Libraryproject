<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Book;
use App\Models\User;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('books', 'user')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_ids' => 'required|array',
            'book_ids.*' => 'exists:books,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $books = Book::whereIn('id', $request->book_ids)->get();
        foreach ($books as $book) {
            if ($book->status != 'available') {
                return redirect()->back()->with('error', 'One or more books are not available.');
            }
        }

        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending',
        ]);

        foreach ($books as $book) {
            $reservation->books()->attach($book->id);
            $book->update(['status' => 'under request']);
        }

        return redirect()->back()->with('success', 'Reservation request has been made.');
    }
}
