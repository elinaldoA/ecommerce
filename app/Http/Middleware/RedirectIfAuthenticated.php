<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        if (Auth::guard($guard)->check()) {
            switch ($guard) {
                case 'admin':
                    return redirect(app()->getLocale() . '/'.  RouteServiceProvider::HOME);
                    break;
                case 'loja':
                    return redirect(app()->getLocale() . '/' . RouteServiceProvider::LOJA);
                    break;
                default:
                    return redirect(app()->getLocale() . RouteServiceProvider::HOME);
                    break;
            }
        }

        return $next($request);
    }
}
