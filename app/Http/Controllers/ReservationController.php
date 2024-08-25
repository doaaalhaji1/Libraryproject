<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $books = Book::all();
        return view('reservations.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'employee_id' => 'nullable|exists:users,id',
            'book_id' => 'nullable|exists:books,id',
            'reservation_start_date' => 'required|date',
            'reservation_end_date' => 'required|date|after_or_equal:reservation_start_date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        Reservation::create($validated);

        return redirect()->route('reservations.index')->with('success', __('public.reservation_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $users = User::all();
        $books = Book::all();
        return view('reservations.edit', compact('reservation', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'employee_id' => 'nullable|exists:users,id',
            'book_id' => 'nullable|exists:books,id',
            'reservation_start_date' => 'required|date',
            'reservation_end_date' => 'required|date|after_or_equal:reservation_start_date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', __('public.reservation_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', __('public.reservation_deleted'));
    }
    // عرض الطلبات المنتظرة 
    public function pendingReservations()
    {
        $reservations = Reservation::where('status', 'pending')->get();
        return view('reservations.pending', compact('reservations'));
    }
    public function approve(Request $request, Reservation $reservation)
    {
       
        $reservation->update(['status' => 'approved']);

        return redirect()->route('reservations.pending')->with('success', __('public.reservation_approved'));
    }
    public function reject(Request $request, Reservation $reservation)
    {
        

        $reservation->update(['status' => 'rejected']);

        return redirect()->route('reservations.pending')->with('success', __('public.reservation_rejected'));
    }
}
