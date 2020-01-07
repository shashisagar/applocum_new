<?php

namespace App\Http\Middleware;

use Closure;
use Bouncer;


class UserManager
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
        $user=\Auth::user();
        if(Bouncer::is($user)->an('user-manager')){
            return $next($request);
        }
        else{
            return response("User can't perform this action.", 401);

        }
        
    }
}
