<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Book;
use App\Models\User;

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


                $reservation = Reservation::create([
                    'user_id' => auth()->id(),
                    'reservation_start_date' => $request->start_date,
                    'reservation_end_date' => $request->end_date,
                    'status' => 'pending',
                ]);



                $book->update([
                    'reservation_id' => $reservation->id,
                    'status' => 'pending'
                ]);



                return redirect()->route('page_books')->with('success', __('public.book_reserved_successfully'));
            }


     //عرض فورم حجز كل الكتب المتاحة
     public function create_books_reservation()
     {
        $books = Book::where('status', 'available')->get();

         return view('reservation.createbooks', compact('books'));
     }

     //حفظ بيانات الحجز
     public function store_books_reservation(Request $request)
    {

        $request->validate([
            'books' => 'required|array',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'reservation_start_date' => $request->start_date,
            'reservation_end_date' => $request->end_date,
            'status' => 'pending',
        ]);

        // استرجاع الكتب المحددة من قاعدة البيانات
        $books = Book::whereIn('id', $request->books)->get();

        // ربط الكتب بالحجز وتحديث حالة كل كتاب
        foreach ($books as $book) {
            $book->update([
                 // ربط الكتاب بالحجز
                'reservation_id' => $reservation->id,
                'status' => 'pending'
            ]);
        }


        return redirect()->route('page_books')->with('success', __('public.reservation_created_successfully'));
    }



     // الموافقة على الحجز
    public function approve(Reservation $reservation)
    {

        $reservation->update([
            'status' => 'approved',
            'employee_id' => auth()->id(),
        ]);


        foreach ($reservation->books as $book) {
            $book->update(['status' => 'reserved']);
        }


        return redirect()->route('reservation')->with('success', __('dash.Reservation_approved_successfully'));
    }


        public function reject(Reservation $reservation)
        {


            $reservation->update(['status' => 'rejected']);

            foreach ($reservation->books as $book) {
                $book->update(['status' => 'available']);
            }


            return redirect()->route('reservation')->with('danger', __('public.reservation_approved_successfully'));
        }


        //اعادة الكتاب من قبل المستخدم
    public function returnuser(Book $book)
    {

        $book->update([
            'status' => 'delivered',
        ]);

        return redirect()->route('mybook_user')->with('success');


    }
            //اعادة الكتاب من قبل الموظف او المدير
        public function returnemployee(Book $book)
        {

            $book->update([
                'status' => 'available',
            ]);
            // الكتاب تابع  لحجز جلب هذا  الحجز
           $reservation= $book->reservation;
            // تحديث الحجز لتخزين معرف الموظف الذي استلم الكتاب
            $reservation->update([
                'recipient_user_id' => auth()->id(),
            ]);

            return redirect()->route('return_book')->with('success', __('public.book_received_successfully'));

        }
        }

