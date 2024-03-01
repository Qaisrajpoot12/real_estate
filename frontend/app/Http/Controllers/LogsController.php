<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LogsController extends Controller
{
    public function getlogs()
    {
        $apiUrl = env('API_URL');


        $token = session()->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("$apiUrl/logs");

        $responseData = $response->json();

        if ($response->successful()) {
            return view('admin.logs', compact('responseData'));
        }
    }
}
