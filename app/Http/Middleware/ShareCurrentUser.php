<?php

namespace App\Http\Middleware;

use Closure;
use View;
use Auth;

class ShareCurrentUser
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
        View::share(['current_user' => Auth::user()]);
        return $next($request);
    }
}
