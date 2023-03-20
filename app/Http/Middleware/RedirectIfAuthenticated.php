<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
        // dd(Auth::user()->department_id);
            // if(Auth::user()->department_id == 1){
            //            return redirect('/walkin_session');
            // }
            // elseif(Auth::user()->department_id == 2){
            //          return redirect('/register_patient');
            // }
            // else{
            //      return redirect('/nursing_listing');
            // }
       
        }

        return $next($request);
    }


}
