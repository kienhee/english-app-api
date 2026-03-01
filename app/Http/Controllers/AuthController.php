<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        unset($data['confirm_password']);

        $user = User::create($data);
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Register success',
            'data' => [
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer',
            ],
        ], 201);
    }
    public function login(Request $request){
        dd($request->all());
    }
}
