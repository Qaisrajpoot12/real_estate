<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

function getUser()
{
    $apiUrl = env('API_URL');

    try {
        $token = session()->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("$apiUrl/user");

        $responseData = $response->json();

        if ($response->successful()) {


            return $responseData;
        } else {
            $responseData;
        }
    } catch (ValidationException $e) {
        $errors = $e->validator->errors();
        return redirect()->back()->withErrors($errors);
    }
}
