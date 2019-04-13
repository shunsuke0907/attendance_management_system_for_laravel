<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function new() {
        return view('users.new');
    }
}
