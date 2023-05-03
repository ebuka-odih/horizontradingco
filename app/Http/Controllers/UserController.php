<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Investment;
use App\Rules\MatchOldPassword;
use App\User;
use App\Withdraw;
use App\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $withdrawal = Withdraw::whereUserId(\auth()->id())->where('status', 1)->sum('amount');
        $p_withdrawal = Withdraw::whereUserId(\auth()->id())->where('status', 0)->sum('amount');
        $l_withdrawal = Withdraw::whereUserId(\auth()->id())->where('status', 1)->select('amount')->orderBy('created_at', 'desc')->first();
        $pending_deposits = Deposit::whereUserId(\auth()->id())->where('status', 0)->sum('amount');
        $deposits = Deposit::whereUserId(\auth()->id())->where('status', 1)->sum('amount');
        $last_deposit = Deposit::whereUserId(\auth()->id())->where('status', 1)->select('amount')->orderBy('created_at', 'desc')->first();
        $investment = Investment::whereUserId(\auth()->id())->where('status', 1)->sum('amount');
        $earned = Investment::whereUserId(\auth()->id())->where('status', 1)->get();
        $total_earned = 0;
        foreach ($earned as $item)
        {
            $total_earned += $item->earning;
        }
        return view('dashboard.index', compact('investment', 'total_earned', 'deposits', 'pending_deposits', 'last_deposit',
            'withdrawal', 'p_withdrawal', 'l_withdrawal'));
    }

    public function all_referrals()
    {
        return view('dashboard.referral');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $data = $this->getData($request);
        $user->update($data);
        return redirect()->back()->with('success', 'Profile Updated Successful');
    }

    protected function getData(Request $request){
        $rules = [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'telegram' => 'nullable',
            'country' => 'nullable',
            'state' => 'nullable',
            'city' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
        ];
        return $request->validate($rules);
    }



    public function storeAcct(Request $request)
    {
        $account = new WithdrawMethod();
        $account->name = $request->name;
        $account->value = $request->value;
        $account->save();
        return redirect()->back()->with('success', "Withdrawal account added successfully");
    }

    public function security()
    {
        return view('dashboard.user.security');
    }

    public function updateSecurity(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with('success', "Password Changed Successfully");
    }
}
