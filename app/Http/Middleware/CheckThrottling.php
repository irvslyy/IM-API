<?php

namespace App\Http\Middleware;

use Closure;

class CheckThrottling
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
      if(auth()->check()){
        return $next($request);
      }
        toastr()->error('Unauthorized access!');
        return back();
    }
}
