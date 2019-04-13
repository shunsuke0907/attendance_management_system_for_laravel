<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\User;

class UsersController extends Controller
{
    public function add() {
        return view('users.add');
    }

    public function create(Request $request) {
        return view('static_pages.index');
    }
}
