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
        $users = User::orderBy('id')->paginate(5);

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
        // FIXME: adminではない場合は自分のみ閲覧可能にする

        $user = Auth::user();

        return view('users.show', compact('user'));
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
        return view('users.edit', compact('user'));
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

        if ($request->user['name']) $user->name = $request->user['name'];
        if ($request->user['email']) $user->email = $request->user['email'];
        if ($request->user['department']) $user->department = $request->user['department'];
        if ($request->user['password']) $user->password = $request->user['password'];
        $user->save();
        session()->flash('success', 'ユーザー情報を更新しました');

        return redirect('users/'.$user->id);
    }

    /**
     * ユーザー削除用のメソッド
     * @return void
     */
    public function destroy(User $user)
    {
        // var_dump('destroy =================');
        // var_dump($user->name);
        // die;

        $userId = $user->id;
        $userName = $user->name;

        $user->delete();
        session()->flash('success', $userName . 'さん（id: ' . $userId . '）を削除しました');

        return redirect('users');
    }

    /**
     * ユーザー情報編集用のメソッド
     * @param object $request フォームからのリクエスト情報
     * @param object $user 該当ユーザーの情報
     * @return void
     */
    public function updateUserInfo(Request $request, User $user)
    {
        // FIXME: ここにバリデーション処理を追加

        if ($request->user['name']) $user->name = $request->user['name'];
        if ($request->user['email']) $user->email = $request->user['email'];
        if ($request->user['department']) $user->department = $request->user['department'];
        if ($request->user['employee_number']) $user->employee_number = $request->user['employee_number'];
        if ($request->user['card_number']) $user->card_number = $request->user['card_number'];
        if ($request->user['basic_time']) $user->basic_time = $request->user['basic_time'];
        if ($request->user['designated_working_start_time']) $user->designated_working_start_time = $request->user['designated_working_start_time'];
        if ($request->user['designated_working_end_time']) $user->designated_working_end_time = $request->user['designated_working_end_time'];
        if ($request->user['password']) $user->password = $request->user['password'];

        $user->save();
        session()->flash('success', $user->name . 'さん（id: ' . $user->id . '）の情報を更新しました');

        return redirect('users');
    }
}
