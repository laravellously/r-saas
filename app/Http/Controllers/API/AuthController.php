<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Throw if authenticated
        if(!Auth::check()){
            return response()->json([
                'message' => 'Already an authenticated user'
            ], 400);
        }

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            Auth::attempt($request->only(Fortify::username(), 'password'));
            $user = $request->user();
            return response()->json([
                'token' => $user->createToken('rimplenet_starter')->plainTextToken,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 401);
        }
    }

    public function register(Request $request){
        // Throw if authenticated
        if(!Auth::check()){
            return response()->json([
                'message' => 'Already an authenticated user'
            ], 400);
        }

        try {
            $user = app(CreateNewUser::class)->create($request);
            Auth::attempt($request->only(Fortify::username(), 'password'));
            $user = $request->user();
            return response()->json([
                'token' => $user->createToken('rimplenet_starter')->plainTextToken,
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
            $user = auth()->user();
            $user->tokens()->delete();
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
