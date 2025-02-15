<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function web()
    {
        return response()->json(['web']);
    }

    public function api()
    {
        return response()->json(['v1']);
    }

    public function home()
    {
        return view('admin.home');
    }
}
