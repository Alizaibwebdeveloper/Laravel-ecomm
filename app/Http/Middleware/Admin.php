<?php
    


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // Check if user is not an admin
        if (Auth::check() && Auth::user()->usertype != 'admin') {
            return redirect('/');  // Redirect to home or another page
        }

        return $next($request);
    }
}
