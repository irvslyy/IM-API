<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class validation
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
        if (in_array($request->header->get('accept'))) {
            return response()->json(['status' => 200]);
        } else if(in_array($request->header->get('accept'))) {
            return response()->json(['catch']);
        } else {
            return response()->json(['status' => 'message']);
        }

        return $next($request);
    }
}
