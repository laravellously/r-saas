<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function me(Request $request)
    {
        $user = getUserFromToken($request->bearerToken());
        return response()->json([
            'message' => $user->load('wallets'),
            // 'wallets' => $user->wallets
        ], Response::HTTP_OK);
    }

    public function login(LoginRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        if(!$user = User::where('email', $validated['email'])->firstOrFail()) {
            return response()->json([
                'message' => 'WRONG CREDENTIALS',
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
        if(!$hash = Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'WRONG CREDENTIALS',
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'message' => 'LOGIN SUCCESS',
            'token' => $user->createToken('rimplenet_starter')->plainTextToken,
        ], 200);
    }

    public function register(Request $request)
    {
        try {
            $user = app(CreateNewUser::class)->create($request->all());
            return response()->json([
                'message' => 'REGISTER SUCCESS',
                'user' => $user,
                'token' => $user->createToken('rimplenet_starter')->plainTextToken,
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = getUserFromToken($request->bearerToken());
            $user->tokens()->delete();
            return response()->json([
                'message' => 'Logged out successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
