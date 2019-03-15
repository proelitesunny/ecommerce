<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
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
if(Auth::user()->role == 'admin' or Auth::user()->role == 'staff') // is an admin
{
    return $next($request); // pass the admin
}

return redirect('/');

    }
}
