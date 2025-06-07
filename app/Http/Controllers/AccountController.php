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

    public function create(Request $request){
        if($request->method() == "POST"){
            try {
                $request->validate([
                    'username' => 'required|string|max:32',
                    'password' => 'required|string|max:64',
                    // 'secpassword' => 'required|string|max:64',
                    'email' => 'nullable|email|max:64',
                    'cmnd' => 'nullable|integer',
                    // 'dob' => 'nullable|date',
                ]);

                $account = new Account();
                $account->username = $request->username;
                $account->password = $request->password;
                $account->secpassword = $request->password;
                $account->rowpass = $request->password;
                $account->email = "";
                $account->cmnd = 0;
                // $account->dob = $request->dob;
                $account->ref = auth()->user()->id;
                $account->dateCreate = time();
                
                // Set default values
                $account->trytocard = 0;
                $account->changepwdret = 0;
                $account->active = 1;
                $account->LockPassword = 0;
                $account->trytohack = 0;
                $account->newlocked = 0;
                $account->locked = 0;
                $account->LastLoginIP = 0;
                $account->PasspodMode = 0;
                $account->coin = 0;
                $account->testcoin = 0;
                $account->lockedCoin = 0;
                $account->bklactivenew = 0;
                $account->bklactive = 0;
                $account->nExtpoin1 = 0;
                $account->nExtpoin2 = 0;
                $account->nExtpoin4 = 0;
                $account->nExtpoin5 = 0;
                $account->nExtpoin6 = 0;
                $account->nExtpoin7 = 0;
                $account->scredit = 0;
                $account->nTimeActiveBKL = 0;
                $account->nLockTimeCard = 0;
                $account->history_add_coin = 0;

                $account->save();

                return redirect()->back()->with('success', 'Account created successfully');

            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to create account: ' . $e->getMessage()
                ], 500);
            }
        }
    }
}
