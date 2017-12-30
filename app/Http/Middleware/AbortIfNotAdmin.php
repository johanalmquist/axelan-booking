<?php

namespace App\Http\Middleware;

use Closure;

class AbortIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->user() || !auth()->user()->isAdmin(auth()->id())){
            return redirect()->to('/login');
        }
        return $next($request);
    }
}
