<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function insert(Request $request)
    {
        $dataUser = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => ['required',   Rules\Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(), ],
            'image' => 'required'
        ]);

        $newUser = User::create([
            'name' => $dataUser['name'],
            'email' => $dataUser['email'],
            'password' => Hash::make($dataUser['password']),
            'image' => $dataUser['image']
        ]);
        return response()->json([
            'message' => 'User created successfully',
            'data' => $newUser
        ]);
    }

    public function update(Request $request, User $user)
    {
        $dataUser = $request->validate([

            'name' => 'min:3|max:50',
            'email' => 'email',
            'password' => ['required',  Rules\Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(), ],
            'image' => 'min:3|max:50',
            'role'=> 'in:admin,member,employee'

        ]);

        $user->update([

            'name' => $dataUser['name'],
            'email' => $dataUser['email'],
            'password' => Hash::make($dataUser['password']),
            'image' => $dataUser['image'],
            'role' => $dataUser['role']

        ]);

        return response()->json([

            'message' => 'User updated successfully',
            'data' => $user

        ]);

    }

    public function delete(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully'


        ]);
    }

    public function changeValidity(Request $request, User $user)
    {
        $dataValidity = $request->validate([
            'role'=> 'in:admin,member,employee'
        ]);
        $user->update([
            'role' => $dataValidity['role']
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user
        ]);
    }
}
