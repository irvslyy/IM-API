<?php

namespace App\Http\Middleware;

use Closure;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array($request->headers->get('accept'))) {
            return response()->json(['status' => 200]);
        } else if (!in_array($request->headers->get('accept'), ['application/json', 'Application/Json'])){
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        return $next($request);           

        
    }
}
