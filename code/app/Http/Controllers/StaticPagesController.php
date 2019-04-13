<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaticPagesController extends Controller
{
    public function index() {
        return view('static_pages.index');
    }
}
