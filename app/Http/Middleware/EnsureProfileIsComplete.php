<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileIsComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $profileCompleteState = Auth::user()->profile_complete_state;
        // return $profileCompleteState;
        if($profileCompleteState != 1) {
            return Redirect::to('/profile/' . Auth::user()->id);
        }
        return $next($request);
    }
}
