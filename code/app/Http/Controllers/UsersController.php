<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function add()
    {
        return view('users.add');
    }

    public function create(Request $request)
    {
        // FIXME: ここにバリデーション処理を追加

        $user = new User;
        $user->name = $request->user['name'];
        $user->email = $request->user['email'];
        $user->department = $request->user['department'];
        $user->password = $request->user['password'];
        $user->save();
        session()->flash('success', 'ユーザーを作成しました');

        return redirect('users/' . $user->id);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // FIXME: ここにバリデーション処理を追加

        $user->name = $request->name;
        $user->save();
        session()->flash('success', 'ユーザー情報を更新しました');

        return redirect('users/'.$user->id);
    }

    public function destroy()
    {
        $user->delete();
        session()->flash('success', 'ユーザーを削除しました');

        return redirect('users');
    }
}
