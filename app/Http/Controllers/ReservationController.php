<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; // استيراد نموذج الحجز
use App\Models\Book; // استيراد نموذج الكتاب
use App\Models\User; // استيراد نموذج المستخدم

class ReservationController extends Controller
{
    // عرض جميع طلبات الحجز
    public function index()
    {

        $reservations = Reservation::with('books', 'user')->get();


        return view('reservation.index', compact('reservations'));
    }


    public function create(Book $book)
    {

        return view('reservation.create',compact('book'));
    }

    // تقديم طلب حجز كتاب
        public function store(Request $request)
        {

                $request->validate([
                    'book_id' => 'required|exists:books,id',
                    'start_date' => 'required|date|after_or_equal:today',
                    'end_date' => 'required|date|after_or_equal:start_date',
                ]);


                $book = Book::findOrFail($request->book_id);


            if (auth()->check()) {

                $reservation = Reservation::create([
                    'user_id' => auth()->id(),
                    'reservation_start_date' => $request->start_date,
                    'reservation_end_date' => $request->end_date,
                    'status' => 'pending',
                ]);

            }

                $book->update([
                    'reservation_id' => $reservation->id,
                    'status' => 'pending'
                ]);



                return redirect()->route('page_books')->with('success', __('Book has been reserved successfully.'));
     }





    public function approve(Reservation $reservation)
    {


        $reservation->update([
            'status' => 'approved',
            'employee_id' => auth()->id(),
        ]);


        foreach ($reservation->books as $book) {
            $book->update(['status' => 'reserved']);
        }


        return redirect()->route('reservation')->with('success', 'Reservation approved successfully.');
    }


        public function reject(Reservation $reservation)
        {


            $reservation->update(['status' => 'rejected']);

            foreach ($reservation->books as $book) {
                $book->update(['status' => 'available']);
            }


            return redirect()->route('reservation')->with('danger', 'Reservation approved successfully.');
        }
    }

//
//     public function returnBook(Request $request, Reservation $reservation)
//     {
//
//         $this->authorize('return', $reservation);

//
//         $reservation->update([
//             'status' => 'completed',
//             'received_by' => auth()->id(),
//         ]);

//
//         foreach ($reservation->books as $book) {
//             $book->update(['status' => 'available']);
//         }

//
//         return redirect()->route('reservations.index')->with('success', 'Book returned successfully.');
//     }
// }
