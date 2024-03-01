<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogListingActivity
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle($request, Closure $next)
    {
        // Perform the action and capture the response
        $response = $next($request);

        // Log details of the CRUD operation
        $user = $request->user();

        $action = $this->getAction($request);
        $user->userLogs()->create(['user_id' => $user->id, 'action' => $action,]);

        return $response;
    }

    private function getAction($request)
    {
        switch ($request->path()) {
            case 'api/list/create':
                return 'create';
            case 'api/list/update':
                return 'update';
            case 'api/list/delete':
                return 'delete';
            default:
                return 'unknown';
        }
    }
}
