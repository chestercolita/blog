<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $rolename)
    {
        $user = Auth::user();
        foreach($user->roles as $role) {
            if(!$role->name === $rolename)
                return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
