<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class SessionsController extends Controller
{
    /**
     * ログインページ
     * @return void
     */
    public function add(Request $request)
    {
        $url = ($request->query('requestUrl')) ? $request->query('requestUrl') : null;

        return view('sessions.add', compact('url'));
    }

    /**
     * ログイン用のメソッド
     * @param string $request ログイン用のリクエスト
     * @return void
     */
    public function create(Request $request)
    {
        $email = $request->session['email'];
        $password = $request->session['password'];
        $user = User::where('email', $email)->where('password', $password)->get()->first();

        if ($user) {
            Auth::loginUsingId($user->id);
            session()->flash('success', 'ログインしました');
            $route = setRedirect($user, $request->requestUrl);
        } else {
            session()->flash('error', 'メールアドレスとパスワードの情報が一致しませんでした');
            $route = 'login';
        }

        return redirect($route);
    }

    /**
     * ログアウト用のメソッド
     * @return void
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'ログアウトしました');

        return redirect('/');
    }
}
