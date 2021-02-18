<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
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
        if (auth()->guest()) {
            return redirect('/login');
        }

        $user_roles = $request->user()->roles->pluck('name')->toArray();

        if (! in_array('super_admin', $user_roles)) {
            return abort(403);
        }
        return $next($request);
    }
}
