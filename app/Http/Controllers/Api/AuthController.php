<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $registerData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8'

        ]);

        $user = User::create([
            'name' => $registerData['name'],
            'email' => $registerData['email'],
            'password' => Hash::make($registerData['password'])
        ]);

        return response()->json([
            'message' => 'User registered successfully',
        ]);

    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);

        $user = User::where('email', $loginData['email'])->first();
        if(!$user || !Hash::check($loginData['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ],401);
        }
        $token = $user->createToken($user->name." authToken ")->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ],200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

}
