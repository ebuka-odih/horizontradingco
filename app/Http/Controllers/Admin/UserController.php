<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Deposit;
use App\Withdraw;
use App\Investment;
use App\Funding;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function users()
    {
        $users = User::where('admin', 0)->latest()->paginate(10);
        return view('admin.user.list', compact('users'));
    }

    public function userDetails($id)
    {
        $user = User::findOrFail($id);
        $deposits = Deposit::where('user_id', $user->id)->select('amount')->sum('amount');
        $withdraw = Withdraw::where('user_id', $user->id)->select('amount')->sum('amount');
        $investment = Investment::where('user_id', $user->id)->select('amount')->sum('amount');
        $fundings = Funding::where('user_id', $user->id)->select('amount')->sum('amount');
        return view('admin.user.personal', compact('user', 'deposits', 'withdraw', 'investment', 'fundings'));
    }
    public function userDeposits($id)
    {
        $user = User::findOrFail($id);
        $deposits = Deposit::where('user_id', $user->id)->get();
        return view('admin.user.user-deposits', compact('user', 'deposits'));
    }
    public function userWithdrawal($id)
    {
        $user = User::findOrFail($id);
        $withdrawal = Withdraw::where('user_id', $user->id)->get();
        return view('admin.user.user-withdraw', compact('user', 'withdrawal'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function wallet()
    {
        return view('admin.user.wallet');
    }

    public function storeWallet(Request $request){
        setting($request->except('_token'))->save();
        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
