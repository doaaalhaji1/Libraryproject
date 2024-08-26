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
}
    // تقديم طلب حجز كتاب
//     public function store(Request $request)
//     {
//         // التحقق من صحة البيانات المدخلة
//         $request->validate([
//             'book_ids' => 'required|array', // التأكد من أن هناك كتب محددة
//             'book_ids.*' => 'exists:books,id', // التأكد من أن كل كتاب موجود
//             'start_date' => 'required|date|after_or_equal:today', // تاريخ البدء يجب أن يكون اليوم أو بعده
//             'end_date' => 'required|date|after_or_equal:start_date', // تاريخ الانتهاء يجب أن يكون بعد تاريخ البدء
//         ]);

//         // التحقق من أن جميع الكتب متاحة للحجز
//         $books = Book::whereIn('id', $request->book_ids)->get();
//         foreach ($books as $book) {
//             if ($book->status != 'available') {
//                 return redirect()->back()->with('error', 'One or more books are not available.');
//             }
//         }

//         // إنشاء طلب الحجز وتعيين الحالة إلى "معلق"
//         $reservation = Reservation::create([
//             'user_id' => auth()->id(), // حفظ معرف المستخدم الحالي (الذي قام بالحجز)
//             'start_date' => $request->start_date, // حفظ تاريخ بدء الحجز
//             'end_date' => $request->end_date, // حفظ تاريخ انتهاء الحجز
//             'status' => 'pending', // تعيين حالة الحجز إلى "معلق"
//         ]);

//         // ربط الكتب بالحجز وتحديث حالة كل كتاب إلى "تحت الطلب"
//         foreach ($books as $book) {
//             $reservation->books()->attach($book->id);
//             $book->update(['status' => 'under request']);
//         }

//         // إعادة التوجيه مع رسالة نجاح
//         return redirect()->back()->with('success', 'Reservation request has been made.');
//     }

//     // قبول طلب الحجز
//     public function approve(Reservation $reservation)
//     {
//         // التحقق من صلاحيات المستخدم الحالي (هل لديه صلاحية الموافقة على الحجز)
//         $this->authorize('approve', $reservation);

//         // تحديث حالة الحجز إلى "مقبول" وتسجيل معرف الموظف الذي وافق على الحجز
//         $reservation->update([
//             'status' => 'approved', // تعيين حالة الحجز إلى "مقبول"
//             'approved_by' => auth()->id(), // حفظ معرف الموظف الذي وافق على الحجز
//         ]);

//         // تحديث حالة الكتب إلى "محجوز" بحيث لا يمكن حجزها من قبل مستخدمين آخرين
//         foreach ($reservation->books as $book) {
//             $book->update(['status' => 'reserved']);
//         }

//         // إعادة التوجيه مع رسالة نجاح
//         return redirect()->route('reservations.index')->with('success', 'Reservation approved successfully.');
//     }

//     // رفض طلب الحجز
//     public function reject(Reservation $reservation)
//     {
//         // التحقق من صلاحيات المستخدم الحالي (هل لديه صلاحية رفض الحجز)
//         $this->authorize('reject', $reservation);

//         // تحديث حالة الحجز إلى "مرفوض"
//         $reservation->update(['status' => 'rejected']);

//         // إعادة حالة الكتب إلى "متاح" بحيث يمكن حجزها مرة أخرى
//         foreach ($reservation->books as $book) {
//             $book->update(['status' => 'available']);
//         }

//         // إعادة التوجيه مع رسالة نجاح
//         return redirect()->route('reservations.index')->with('success', 'Reservation rejected.');
//     }

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
