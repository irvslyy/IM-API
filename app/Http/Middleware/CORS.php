<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        return $next($request)
          ->header('Access-Control-Allow-Origin', '*');


        /**
         * 
         * 
         * INI UDAH NGGA KEPAKE TAPI MASIH
         * DI SIMPE BUAT JAGA2 KALO BUTUH LAGI
         */

        //   ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE,OPTIONS')
        //   ->header('Access-Control-Allow-Headers', 'Content-Type, Authorizations');
    }

}
