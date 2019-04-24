<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class VerifyAdmin
{
    /**
     * ログインユーザーがadminかどうかを判別する
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ((boolean) Auth::user()->is_admin) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
