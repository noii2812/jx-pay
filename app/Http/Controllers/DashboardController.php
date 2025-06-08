<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $coin = $user->coin;
        $accounts = $user->accounts()->count();

        return view("dashboard", compact("coin","accounts"));
    }
}
