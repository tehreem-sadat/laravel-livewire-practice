<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 

class CheckIfApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and approved
        if (Auth::check() && !Auth::user()->approved) {
            // Redirect to a specific route or show an error message
            return redirect()->route('unapproved'); // Redirect to a page explaining approval is required
        }
        return $next($request);
    }
}
