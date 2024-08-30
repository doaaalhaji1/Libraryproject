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
        // جلب جميع طلبات الحجز مع ربط تفاصيل الكتب والمستخدمين المرتبطين بكل حجز
        $reservations = Reservation::with('books', 'user')->get(); // 'books' لأن الحجز يمكن أن يتضمن عدة كتب

        // عرض صفحة الحجزات مع تمرير البيانات إليها
        return view('reservation.index', compact('reservations'));
    }


    public function create(Book $book)
    {

        return view('reservation.create',compact('book'));
    }

    // تقديم طلب حجز كتاب
        public function store(Request $request)
        {
                // التحقق من صحة البيانات المدخلة اسماء الحقول
                $request->validate([
                    'book_id' => 'required|exists:books,id', // التأكد من أن الكتاب موجود
                    'start_date' => 'required|date|after_or_equal:today', // تاريخ البدء يجب أن يكون اليوم أو بعده
                    'end_date' => 'required|date|after_or_equal:start_date', // تاريخ الانتهاء يجب أن يكون بعد تاريخ البدء
                ]);

                // جلب الكتاب بناءً على المعرف
                $book = Book::findOrFail($request->book_id);


                // إنشاء طلب الحجز اول الشي الأعمدة
                $reservation = Reservation::create([
                    'user_id' => auth()->id(), // حفظ معرف المستخدم الحالي
                    'reservation_start_date' => $request->start_date, // حفظ تاريخ بدء الحجز
                    'reservation_end_date' => $request->end_date, // حفظ تاريخ انتهاء الحجز
                    'status' => 'pending', // تعيين حالة الحجز إلى "معلق"
                ]);

                // تحديث الكتاب لربطه بالحجز الجديد وتحديث حالته
                $book->update([
                    'reservation_id' => $reservation->id, // ربط الكتاب بالحجز
                    'status' => 'pending' // تحديث حالة الكتاب
                ]);

                // إعادة التوجيه مع رسالة نجاح

                return redirect()->route('page_books')->with('success', __('Book has been reserved successfully.'));
     }




    // قبول طلب الحجز
    public function approve(Reservation $reservation)
    {
        // التحقق من صلاحيات المستخدم الحالي (هل لديه صلاحية الموافقة على الحجز)
        // $this->authorize('approve', $reservation);

        // تحديث حالة الحجز إلى "مقبول" وتسجيل معرف الموظف الذي وافق على الحجز
        $reservation->update([
            'status' => 'approved', // تعيين حالة الحجز إلى "مقبول"
            'employee_id' => auth()->id(), // حفظ معرف الموظف الذي وافق على الحجز
        ]);

        // تحديث حالة الكتب إلى "محجوز" بحيث لا يمكن حجزها من قبل مستخدمين آخرين
        foreach ($reservation->books as $book) {
            $book->update(['status' => 'reserved']);
        }

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('reservation')->with('success', 'Reservation approved successfully.');
    }

        // رفض طلب الحجز
        public function reject(Reservation $reservation)
        {
            // التحقق من صلاحيات المستخدم الحالي (هل لديه صلاحية رفض الحجز)
            // $this->authorize('reject', $reservation);

            // تحديث حالة الحجز إلى "مرفوض"
            $reservation->update(['status' => 'rejected']);

            // إعادة حالة الكتب إلى "متاح" بحيث يمكن حجزها مرة أخرى
            foreach ($reservation->books as $book) {
                $book->update(['status' => 'available']);
            }

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('reservation')->with('danger', 'Reservation approved successfully.');
        }
    }

//     // استلام الكتاب من المستخدم
//     public function returnBook(Request $request, Reservation $reservation)
//     {
//         // التحقق من صلاحيات المستخدم الحالي (هل لديه صلاحية استلام الكتاب)
//         $this->authorize('return', $reservation);

//         // تحديث حالة الحجز إلى "مكتمل" وتسجيل معرف الموظف الذي استلم الكتاب
//         $reservation->update([
//             'status' => 'completed', // تعيين حالة الحجز إلى "مكتمل"
//             'received_by' => auth()->id(), // حفظ معرف الموظف الذي استلم الكتاب
//         ]);

//         // تحديث حالة الكتب إلى "متاح" بحيث يمكن حجزها مرة أخرى
//         foreach ($reservation->books as $book) {
//             $book->update(['status' => 'available']);
//         }

//         // إعادة التوجيه مع رسالة نجاح
//         return redirect()->route('reservations.index')->with('success', 'Book returned successfully.');
//     }
// }
