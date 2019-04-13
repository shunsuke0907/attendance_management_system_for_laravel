<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaticPagesController extends Controller
{
    public function index() {
        $now = date("Y/m/d H:i:s");
        return view('static_pages.index', compact('now'));
    }
}
