<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:4',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'agent',
            ]);
            if ($user) {
                // $token = $user->createToken('authToken')->plainTextToken;

                // return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);

                return response()->json(['message' => 'Successfully registered']);
            } else {
                return response()->json(['error' => 'Registration failed']);
            }
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 422);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $user = User::where('email', $request->email)->first();

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 422);
        }
    }

    public function res(Request $request)
    {
        return response()->json(['error' => 'invalid login token']);
    }


    public function logout(Request $request)
    {


        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
