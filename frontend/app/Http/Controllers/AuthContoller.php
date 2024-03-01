<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class AuthContoller extends Controller
{
    public function register()
    {
        return view('admin.signup');
    }

    public function register_submit(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string|min:4',
            ]);

            $apiUrl = env('API_URL');

            $response = Http::post("$apiUrl/register", [
                'name' =>  $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $responseData = $response->json();
            if ($response->successful()) {
                return redirect()->route('login')->with('success', 'Registration successful');
            } else {


                return redirect()->back()->withErrors($responseData['error']);
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }

    public function login()
    {
        return view('admin.login');
    }
    public function login_submit(Request $request)
    {
        $apiUrl = env('API_URL');

        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:4',
            ]);

            $response = Http::post("$apiUrl/login", [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $responseData = $response->json();

            if ($response->successful()) {

                session()->put('access_token', $responseData['access_token']);

                return redirect()->route('home')->with('success', 'Login successful');
            } else {
                return redirect()->back()->with($responseData);
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }


    public function logout(Request $request)
    {
        $apiUrl = env('API_URL');

        try {
            $token = session()->get('access_token');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post("$apiUrl/logout");

            $responseData = $response->json();

            if ($response->successful()) {
                $token = session()->forget('access_token');

                return redirect()->route('login')->with('success', 'Logout successful');
            } else {
                return redirect()->back()->with($responseData);
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }
}
