<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = now();
        $start = Carbon::parse('08:00:00');
        $end = Carbon::parse('17:00:00');
        if ($now->lt($start) || $now->gt($end)) {
            return $next($request);
        }
        else {
            return response()->json(
                ['message' => 'Access denied: Outside of allowed access time (08:00 - 17:00).'],
                403
            );
        }
    }
}
