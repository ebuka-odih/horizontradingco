<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApproveWithdraw;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminWithdraw extends Controller
{
    public function withdrawal()
    {
        $withdrawal = Withdraw::all();
        return view('admin.transactions.withdrawal', compact('withdrawal'));
    }

    public function withdrawDetails($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        return view('admin.transactions.withdraw-detail', compact('withdraw'));
    }

    public function approve_withdrawal($id)
    {

        $withdraw = Withdraw::findOrFail($id);
        $user = User::findOrFail($withdraw->user_id);
        if ($withdraw->wallet == 'btc_balance')
        {
            $user->btc_balance -= $withdraw->amount;
            $user->save();
            $withdraw->status = 1;
            $withdraw->save();
            Mail::to($user->email)->send(new ApproveWithdraw($withdraw));
            return redirect()->back()->with('success', "Withdrawal Approved Successfully");
        }elseif($withdraw->wallet == 'usdt_balance')
        {
            $user->usdt_balance -= $withdraw->amount;
            $user->save();
            $withdraw->status = 1;
            $withdraw->save();
            Mail::to($user->email)->send(new ApproveWithdraw($withdraw));
            return redirect()->back()->with('success', "Withdrawal Approved Successfully");
        }elseif($withdraw->wallet == 'eth_balance')
        {
            $user->eth_balance -= $withdraw->amount;
            $user->save();
            $withdraw->status = 1;
            $withdraw->save();
            Mail::to($user->email)->send(new ApproveWithdraw($withdraw));
            return redirect()->back()->with('success', "Withdrawal Approved Successfully");
        }elseif($withdraw->wallet == 'doge_balance')
        {
            $user->doge_balance -= $withdraw->amount;
            $user->save();
            $withdraw->status = 1;
            $withdraw->save();
            Mail::to($user->email)->send(new ApproveWithdraw($withdraw));
            return redirect()->back()->with('success', "Withdrawal Approved Successfully");
        }elseif($withdraw->wallet == 'profit')
        {
            $user->profit -= $withdraw->amount;
            $user->save();
            $withdraw->status = 1;
            $withdraw->save();
            Mail::to($user->email)->send(new ApproveWithdraw($withdraw));
            return redirect()->back()->with('success', "Withdrawal Approved Successfully");
        }elseif($withdraw->wallet == 'ref_bonus')
        {
            $user->ref_bonus -= $withdraw->amount;
            $user->save();
            $withdraw->status = 1;
            $withdraw->save();
            Mail::to($user->email)->send(new ApproveWithdraw($withdraw));
            return redirect()->back()->with('success', "Withdrawal Approved Successfully");
        }
        return redirect()->back();

    }

    public function delete_withdrawal($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->delete();
        return redirect()->back();
    }
}
