<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   // عرض جميع الكتب للمدير او الموظف
        $books = Book::all();

        return view('books.index', compact('books'));
    }


    public function index_retun_books()
    {   // عرض  الكتب المعادة  المسلمة للمدير او الموظف

        $books = Book::where('status','delivered')->get();

        return view('books.returnbooks', compact('books'));
    }



    public function availableBooks()
    {
        // عرض الكتب المتاحة فقط للمستخدمين
        $books = Book::with('authors')->where('status', 'available')->get();

        $categories = Category::all();

        return view('Homeuser', compact('books','categories'));
    }

    public function mybooks()
    {

            $user = auth()->user();
        //books المستخدم له حجوزات وحصلنا على الكتب التابعة للحجز  عن طريق الدالة
        // الموجودة بمودل الحجوزات  اي الكتب التابعة لهذا الحجز وايضا حالة الحجز موافق عليه الموظف

            $reservations = $user->reservations()->with('books')->where('status','approved')->get();


            return view('mybooks', compact('reservations'));

    }

    public function Reserved_Books_Data()
    {
        // عرض كل الكتب التي حجزت وتم استلامها ليتم معرفة من هم الموظفين الذين وافقوا واستلموا الكتاب

        //الطريقة الاولى
        // $books = Book::where('status','reserved')->get();

            //الطريقة الثانية
          $reservations = Reservation::where('status','approved')->get();


        return view('reservedbooksdata', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ارسال المجموعات والمالكين من اجل سهولة الاختيار
        $categories = Category::all();
        $authors=Author::all();

        return view('books.create', compact('categories','authors'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'bookdescription' => 'required|string|max:255',
            'bookcontent' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'categories' => 'array' , // تأكد من أن الفئات هي مصفوفة من IDs
            'Authers' => 'array'
        ]);

        // تخزين صورة الكتاب إذا كانت موجودة
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('book_images', 'public');
        }


        $book = Book::create([
            'title' => $request->title,
            'language' => $request->language,
            'description' => $request->bookdescription,
            'book_content' => $request->bookcontent,
            'image' => $imagePath,
        ]);


        if (isset($validated['categories'])) {
            $book->categories()->attach($validated['categories']);
        }

        if (isset($validated['Authers'])) {
            $book->authors()->attach($validated['Authers']);
        }


        return redirect()->route('books')->with('success', __('public.book_created'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

        return view('books.show', compact('book'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors=Author::all();

        return view('books.edit', compact('book','categories','authors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {

        // التحقق من صحة البيانات
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'bookdescription' => 'required|string|max:255',
            'bookcontent' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'categories' => 'array',
            'Authers'=> 'array'
        ]);


        // تحديث بيانات الكتاب
        $book->update([
            'title' => $request->title,
            'language' => $request->language,
            'description' => $request->bookdescription,
            'book_content' => $request->bookcontent,
            'image' => $request->hasFile('image') ? $request->file('image')->store('book_images', 'public') : $book->image,
        ]);

        // تحديث الفئات المرتبطة بالكتاب
        if ($request->has('categories')) {
            $book->categories()->sync($request->input('categories'));
        } else {
            $book->categories()->sync([]);
        }


        if ($request->has('Authers')) {
            $book->authors()->sync($request->input('Authers'));
        } else {
            $book->authors()->sync([]);
        }

        return redirect()->route('books')->with('success', __('public.book_updated'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books')->with('success', __('public.book_deleted'));
    }



    public function search(Request $request)
    {
        $query = $request->input('search');
        $categoryId = $request->input('category');   
        
        $booksQuery = Book::where('status', 'available')
            ->where(function($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhere('book_content', 'LIKE', "%{$query}%")
                  ->orWhereHas('authors', function($q) use ($query) {
                      $q->where('name', 'LIKE', "%{$query}%");
                  });
            });
    
        $categoryDescription = null; // متغير لتخزين وصف الفئة المحددة
        if ($categoryId) {
            $booksQuery->whereHas('categories', function($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
    
            // استرجاع الفئة ووصفها إذا كانت موجودة
            $category = Category::find($categoryId);
            if ($category) {
                $categoryDescription = $category->slug; // استخراج وصف الفئة
            }
        }
    
        // استرجاع نتائج الكتب
        $books = $booksQuery->get();
        $categories = Category::all(); // جميع الفئات للاختيار منها في واجهة المستخدم
    
        // تمرير الكتب والفئات ووصف الفئة (إذا وجد) إلى العرض
        return view('Homeuser', compact('books', 'categories', 'categoryDescription'));
    }
    
public function searchemploy(Request $request)
{
    $query = $request->input('search');

    if ($query) {
        $booksQuery = Book::where('status', 'available')
            ->where(function($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhere('book_content', 'LIKE', "%{$query}%")
                  ->orWhereHas('authors', function($q) use ($query) {
                      $q->where('name', 'LIKE', "%{$query}%");
                  });
            });

        $books = $booksQuery->get();
        return view('books.index', compact('books'));

    }
    return back()->with('message', 'Please enter a search term.');


}

}
