<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\elementType;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check())
                {
                    return redirect(route('posts.index'));
                }
                break;

            default:
                {
                    if (Auth::guard($guard)->check())
                        return redirect('/');
                }
                break;
        }


        return $next($request);
    }
}
