<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => 'successfully registered',
            'account' => $user
        ], 201);
    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'invalid login!'
            ], 401);
        }
        if ($user->role !== 'admin') {
            return response()->json([
                'status' => 'not allowed! no permission!'
            ], 403);
        }
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'status' => 'successfully login',
            'account' => $user,
            'token' => $token
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'logout successfully'
        ], 200);
    }
}
