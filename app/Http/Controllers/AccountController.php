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

    /**
     * Display all game accounts for admin/GM users
     */
    public function adminIndex(Request $request)
    {
        // Get query parameters for filtering
        $username = $request->input('username');
        $status = $request->input('status');
        $userId = $request->input('user_id');
        
        // Start query builder
        $query = Account::query()->with('user:id,username,email');
        
        // Apply filters if provided
        if ($username) {
            $query->where('username', 'like', "%{$username}%");
        }
        
        if ($status === 'active') {
            $query->where('active', 1);
        } elseif ($status === 'inactive') {
            $query->where('active', 0);
        }
        
        if ($userId) {
            $query->where('ref', $userId);
        }
        
        // Get paginated results
        $accounts = $query->orderBy('dateCreate', 'desc')->paginate(15);
        
        // Count total accounts
        $totalAccounts = Account::count();
        $activeAccounts = Account::where('active', 1)->count();
        
        return view('gameAccounts', compact('accounts', 'totalAccounts', 'activeAccounts'));
    }

    /**
     * Get account details for the admin panel
     */
    public function getAccountDetails($id)
    {
        $account = Account::with('user:id,username,email')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $account
        ]);
    }
    
    /**
     * Toggle account status (active/inactive)
     */
    public function toggleStatus(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        
        // Toggle the active status
        $account->active = $account->active == 1 ? 0 : 1;
        $account->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Account status updated successfully',
            'status' => $account->active
        ]);
    }
    
    /**
     * Update account details
     */
    public function updateAccount(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        
        $validated = $request->validate([
            'email' => 'nullable|email|max:64',
            'active' => 'required|boolean',
            'coin' => 'required|integer|min:0',
            'password' => 'nullable|string|min:6|max:64',
        ]);
        
        // Update account details
        $account->email = $validated['email'] ?? '';
        $account->active = $validated['active'];
        $account->coin = $validated['coin'];
        
        // Update password if provided
        if (!empty($validated['password'])) {
            $account->password = md5($validated['password']);
            $account->secpassword = md5($validated['password']);
            $account->rowpass = md5($validated['password']);
        }
        
        $account->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Account updated successfully',
            'data' => $account
        ]);
    }
    
    /**
     * Store a new game account from admin panel
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'username' => 'required|string|max:32|unique:account,username',
                'password' => 'required|string|min:6|max:64',
                'user_id' => 'nullable|exists:users,id',
                'initial_coins' => 'nullable|integer|min:0',
                'active' => 'nullable|boolean',
            ]);
            
            $account = new Account();
            $account->username = $validated['username'];
            $account->password = md5($validated['password']);
            $account->secpassword = md5($validated['password']);
            $account->rowpass = md5($validated['password']);
            $account->email = "";
            $account->cmnd = 0;
            $account->ref = $validated['user_id'] ?? 0;
            $account->dateCreate = time();
            $account->coin = $validated['initial_coins'] ?? 0;
            $account->active = isset($validated['active']) ? 1 : 0;
            
            // Set default values
            $account->trytocard = 0;
            $account->changepwdret = 0;
            $account->LockPassword = 0;
            $account->trytohack = 0;
            $account->newlocked = 0;
            $account->locked = 0;
            $account->LastLoginIP = 0;
            $account->PasspodMode = 0;
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
            
            return response()->json([
                'success' => true,
                'message' => 'Game account created successfully',
                'data' => $account
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create game account: ' . $e->getMessage()
            ], 422);
        }
    }
}
