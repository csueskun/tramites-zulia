<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if($user) {
            $role = strtolower($user->role);
            return redirect("/$role/home");
        }
        return $next($request);
    }
}
