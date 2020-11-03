<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        /* $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        } */
        if (Auth::guard($guards)->check()) {
            $role = Auth::user()->admin; 
        
            switch ($role) {
              case 1:
                 return redirect('/admin/dashboard');
                 break;
              case 0:
                 return redirect('/home');
                 break; 
              default:
                 return redirect('/home'); 
                 break;
            }
          }

        return $next($request);
    }
}
