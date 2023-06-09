<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (!auth()->check()) {
        //     return redirect('/');
        // }
        // if (auth()->user()->roles()->where('title', 'student')->count() > 0) {
        //     return redirect('/');
        // }

        // return $next($request);
        if (Auth::check()) {
            if (Auth::user()->role_as == '1') {
                return $next($request);
            } else {
                return redirect()->back()->with("status", "Access Denied! You are not allowed.");
            }
        } else {
            return redirect()->back()->with("status", "Access Denied! You are not allowed.");
        }
    }
}
