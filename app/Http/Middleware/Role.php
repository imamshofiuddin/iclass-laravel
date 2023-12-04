<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if(in_array(session('user_role'), $role)){
            return $next($request);
        }

        return redirect()->back();
    }
}
