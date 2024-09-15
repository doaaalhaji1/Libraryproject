<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
    
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
    
        if ($request->hasFile('image')) {
            if ($request->user()->image) {
                Storage::delete('public/user_images/' . $request->user()->image);
            }
    
            // حفظ الصورة الجديدة في المسار المحدد
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->move('C:/Users/Doaa/Herd/Libraryproject/storage/app/public/user_images', $filename);
    
            // تحديث مسار الصورة في قاعدة البيانات
            $request->user()->image = 'user_images/' . $filename;
        }
    
        // حفظ البيانات الجديدة
        $request->user()->save();
    
        // إعادة التوجيه مع رسالة نجاح
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
 



}
