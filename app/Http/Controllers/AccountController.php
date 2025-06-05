<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
class AccountController extends Controller
{
    //
    public function index()
    {
        $accounts = Account::where("ref", auth()->user()->id)->get();
        return view("game", compact("accounts"));
    }
}
