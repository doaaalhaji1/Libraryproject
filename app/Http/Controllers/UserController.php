<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // التحقق من صحة البيانات بما في ذلك الصورة
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'role' => 'required|in:admin,employee,member',
        'password' => ['required', 'confirmed', Password::min(8)
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()],
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // التحقق من صحة الصورة
    ]);

    // التحقق إذا تم رفع صورة ومعالجة رفعها
    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension(); // اسم عشوائي للصورة
        $imageName = $image->store('user_images', 'public'); // تخزين الصورة في storage/app/public/user_images
    }

    // إنشاء المستخدم وحفظ الصورة في قاعدة البيانات
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
        'image' => $imageName, // حفظ اسم الصورة في قاعدة البيانات إذا تم رفع صورة
    ]);

    return redirect()->route('users')
                     ->with('success', __('public.user_created'));
}


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,employee,member',
            'password' => ['nullable', 'confirmed', Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()],
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // التحقق من صحة الصورة
        ]);
    
        // التحقق من وجود صورة جديدة
        if ($request->hasFile('image')) {
            // التحقق من وجود صورة قديمة وحذفها
            if ($user->image && file_exists(public_path('images/users/' . $user->image))) {
                Storage::disk('public')->delete($user->image); // حذف الصورة القديمة من storage
            }
    
            // رفع الصورة الجديدة
            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension(); // اسم عشوائي للصورة
            $imageName = $image->store('user_images', 'public'); // تخزين الصورة الجديدة
            $user->image = $imageName; // تحديث حقل الصورة في قاعدة البيانات
        }
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'image' => $user->image ?? $user->image, // تأكد من عدم تعديل الصورة إذا لم يتم رفع صورة جديدة
        ]);
    
        return redirect()->route('users')
                         ->with('success', __('public.user_updated'));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
          // تحقق من وجود الصورة وحذفها
    if ($user->image && Storage::disk('public')->exists('user_images/' . $user->image)) {
        Storage::disk('public')->delete('user_images/' . $user->image);
    }

    // حذف المستخدم من قاعدة البيانات
    $user->delete();
    
        return redirect()->route('users')
                         ->with('success', __('public.user_deleted'));
    }
    public function updateRole(Request $request, User $user)
{
    $request->validate([
        'role' => 'required|in:admin,employee,member',
    ]);

    $user->role = $request->role;
    $user->save();

    return redirect()->route('users.show', $user->id)
                     ->with('success', __('public.Role_updated'));
}

}
