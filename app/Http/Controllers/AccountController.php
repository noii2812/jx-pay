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
                $account->password = md5($request->password);
                $account->secpassword = md5($request->password);
                $account->rowpass = md5($request->password);
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
                $errorMessage = 'Failed to create account. ';
                
                // Check for common database errors
                if (str_contains($e->getMessage(), 'Duplicate entry')) {
                    $errorMessage .= 'This username is already taken.';
                } elseif (str_contains($e->getMessage(), 'Data too long')) {
                    $errorMessage .= 'Input data is too long.';
                } else {
                    $errorMessage .= 'Please try again later.';
                }
                
                return redirect()->back()->with('error', $errorMessage);
            }
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $request->validate([
                'account_id' => 'required|exists:account,id',
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:6|max:64',
                'confirm_password' => 'required|same:new_password'
            ]);

            $account = Account::where('id', $request->account_id)
                            ->where('ref', auth()->user()->id)
                            ->firstOrFail();

            // Verify current password
            if (md5($request->current_password) !== $account->password) {
                return redirect()->back()->with('error', 'Current password is incorrect');
            }

            // Update password
            $account->password = md5($request->new_password);
            $account->secpassword = md5($request->new_password);
            $account->rowpass = md5($request->new_password);
            $account->save();

            return redirect()->back()->with('success', 'Password updated successfully');
        } catch (\Exception $e) {
           
            return redirect()->back()->with('error', 'Failed to update password. Please try again.');
        }
    }
}
