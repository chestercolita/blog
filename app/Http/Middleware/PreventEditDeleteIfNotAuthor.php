<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PreventEditDeleteIfNotAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();
        $checkRoutes = ['posts.edit', 'posts.update', 'posts.destroy'];
        if(Str::contains($route->getName(), $checkRoutes)) {
            return back();
        }
        return $next($request);
    }
}
