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
        // var_dump('<pre>');
        // var_dump('create ==============');
        // var_dump($request->user['name']);
        // die;

        $user = new User;
        $user->name = $request->user['name'];
        $user->email = $request->user['email'];
        $user->password = $request->user['password'];

        // var_dump('<pre>');
        // var_dump('create ==============');
        // var_dump($user);
        // die;

        $user->save();

        return redirect('users/'.$user->id);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->save();

        return redirect('users/'.$user->id);
    }

    public function destroy()
    {
        $user->delete();

        return redirect('users');
    }
}
