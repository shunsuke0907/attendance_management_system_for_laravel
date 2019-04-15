<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * 一覧ページ
     * @return void
     */
    public function index()
    {
        // FIXME: ここはadminのみ閲覧可能にする / それ以外はhomeへredirect

        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * 詳細ページ
     * @param object $user 該当ユーザーの情報
     * @return void
     */
    public function show($id)
    {
        // FIXME: ここはログイン済みかadminであれば閲覧できる仕様にする

        if ($this->isLogin() && $this->isCorrect()) {
            $user = Auth::user();

            return view('users.show', compact('user'));
        } else {
            return redirect('/');
        }
    }

    /**
     * 新規作成ページ
     * @return void
     */
    public function add()
    {
        return view('users.add');
    }

    /**
     * ユーザー新規作成用のメソッド
     * @param object $request フォームからのリクエスト情報
     * @return void
     */
    public function create(Request $request)
    {
        // FIXME: ここにバリデーション処理を追加

        $user = new User;
        $user->name = $request->user['name'];
        $user->email = $request->user['email'];
        $user->department = $request->user['department'];
        $user->password = $request->user['password'];
        $user->save();

        Auth::loginUsingId($user->id);
        session()->flash('success', 'ユーザーを作成しました');

        return redirect('users/' . $user->id);
    }

    /**
     * 編集ページ
     * @param object $user 該当ユーザーの情報
     * @return void
     */
    public function edit(User $user)
    {
        if ($isLogin) {
            return view('users.edit', compact('user'));
        } else {
            return redirect('/');
        }
    }

    /**
     * ユーザー情報編集用のメソッド
     * @param object $request フォームからのリクエスト情報
     * @param object $user 該当ユーザーの情報
     * @return void
     */
    public function update(Request $request, User $user)
    {
        // FIXME: ここにバリデーション処理を追加

        $user->name = $request->name;
        $user->save();
        session()->flash('success', 'ユーザー情報を更新しました');

        return redirect('users/'.$user->id);
    }

    /**
     * ユーザー削除用のメソッド
     * @return void
     */
    public function destroy()
    {
        $user->delete();
        session()->flash('success', 'ユーザーを削除しました');

        return redirect('users');
    }

    /**
     * ログインしているユーザーかを判別するメソッド
     * @return bool
     */
    private function isLogin()
    {
        return (Auth::user()) ? true : false;
    }

    /**
     * 正しいユーザーかを判別するメソッド
     * @return bool
     */
    private function isCorrect($id)
    {
        if (!Auth::user())  return false;

        return ((int) $id === Auth::user()->id) ? true : false;
    }
}
