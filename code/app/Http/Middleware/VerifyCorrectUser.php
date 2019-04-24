<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class VerifyCorrectUser
{
    /**
     * 正しいユーザーかを判別する（管理者の場合は判定を行なわない）
     * 判定にuser.idを使用している為、routesに{id}を指定している箇所で使う
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
        }

        if (!Auth::user() || (int) $request->route('id') !== Auth::user()->id) {
            session()->flash('error', '自分以外の詳細ページにはアクセスできません');
            return redirect('/');
        }

        return $next($request);
    }
}
