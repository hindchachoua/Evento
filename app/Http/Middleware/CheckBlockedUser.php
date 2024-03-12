<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckBlockedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    

    $user = Auth::user();

    if ($user && $user->is_blocked) {
        Auth::logout();
        return redirect('/login')->with('error', 'Your account has been blocked.');
    }

    return $next($request);
}
}
