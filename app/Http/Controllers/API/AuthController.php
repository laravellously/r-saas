<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            Auth::attempt($request->only(Fortify::username(), 'password'));
            return response()->json([
                'token' => Auth::user()->createToken('rimplenet_starter')->plainTextToken,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 401);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return response()->json([
                'message' => 'Logged out successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 401);
        }
    }
}
