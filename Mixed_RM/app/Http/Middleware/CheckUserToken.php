<?php

namespace App\Http\Middleware;

use App\Helpers\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    if(!auth()->guard('sanctum')->check()){
        return response()->json([
            'message' => 'token anda tidak valid atau belum login'
        ], 401);
    }
        return $next($request);
    }
}
