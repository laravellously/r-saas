<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function me(){
        return response()->json([
            'message' => auth('api')->user(),
            'status' => 'ok'
        ]);
    }

    public function login(Request $request)
    {
        // Throw if authenticated
        if(auth('api')->check()){
            return response()->json([
                'message' => 'Already an authenticated user'
            ], 400);
        }

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            auth('api')->attempt($request->all());
            return response()->json([
                'message' => 'Login successful',
                'token' => auth('api')->user()->createToken('rimplenet_starter')->plainTextToken,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 401);
        }
    }

    public function register(Request $request){
        tenant()->run(function () use ($request) {
            if(Auth::check()){
                return response()->json([
                    'message' => 'Already an authenticated user'
                ], 400);
            }

            try {
                $user = app(CreateNewUser::class)->create($request->all());
                $user = Auth::guard('api')->loginUsingId($user->id);
                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken('rimplenet_starter')->plainTextToken,
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage()
                ], 401);
            }
        });
    }

    // public function logout()
    // {
    //     try {
    //         Auth::logout();
    //         $user = auth()->user();
    //         $user->tokens()->delete();
    //         return response()->json([
    //             'message' => 'Logged out successfully'
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'message' => $th->getMessage()
    //         ], 401);
    //     }
    // }
}
