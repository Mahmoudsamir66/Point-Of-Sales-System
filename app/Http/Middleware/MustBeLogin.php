<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeLogin
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



        if(auth('web')->check() == false) {
            return redirect(route('admin.login'));
        }

        // Otherwise, Continue.
        return $next($request);
    }
}
