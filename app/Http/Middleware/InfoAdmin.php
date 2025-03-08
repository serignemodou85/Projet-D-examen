<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ShareUserInfo
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
        view()->share('userInfo', [
            'nom' => Auth::check() ? Auth::user()->nom : '',
            'prenom' => Auth::check() ? Auth::user()->prenom : '',
            'statut' => Auth::check() ? Auth::user()->role : '',
        ]);

        return $next($request);
    }
}
