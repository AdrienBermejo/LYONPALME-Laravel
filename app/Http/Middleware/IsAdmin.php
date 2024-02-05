<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
            return $next($request);
        }

        return abort(403, 'Accès refusé');
    }
}
