<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function getLogs(Request $request)
    {
        // $user = User::find($request->user()->id);
        $user = User::with('logs')->find($request->user()->id);
        $logs = $user;
        return response()->json(['data' => $logs]);
    }
}
