<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class VerifyLogin
{
    /**
     * ログインしているユーザーかを判別する
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            return $next($request);
        } else {
            $requestUrl = request()->path();
            session()->flash('error', 'ログインしてください');

            return redirect('login' . '?' . http_build_query(['requestUrl' => $requestUrl]));
        }
    }
}
