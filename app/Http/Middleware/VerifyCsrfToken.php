<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;

class VerifyCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            $loginedUser = User::find(Auth::user()->id);
            $email_verified_at = Auth::user()->email_verified_at;
            if($email_verified_at == null) {
                Auth::logout($loginedUser);
                return Redirect::to('/');
            }
        }
        return $next($request);
    }
}
