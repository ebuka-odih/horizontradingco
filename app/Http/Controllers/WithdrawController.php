<?php

namespace App\Http\Controllers;

use App\Mail\AdminWithdrawAlert;
use App\Mail\RequestWithdraw;
use App\User;
use App\Withdraw;
use App\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{

    public function transactions()
    {
        $count = Withdraw::whereUserId(\auth()->id())->where('status', 0)->count();
        $withdraw = Withdraw::whereUserId(\auth()->id())->latest()->paginate(6);
        return view('dashboard.withdraw.withdraw-history', compact('withdraw', 'count'));
    }
    public function withdraw()
    {
        $w_method = WithdrawMethod::whereUserId(auth()->id())->get();

        if (count($w_method) > 0 && \auth()->user()->balance > 0){
            return view('dashboard.withdraw.withdraw', compact('w_method'));
        }elseif(count($w_method) < 1){
            return view('dashboard.withdraw.notice2');
        }
        return view('dashboard.withdraw.notice');

    }

    public function processWithdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'withdraw_method_id' => 'required',
        ]);
        $withdraw = new Withdraw();
        if ($request->amount >= 50){
            $withdraw->amount = $request->amount;
            $withdraw->user_id = Auth::id();
            $withdraw->withdraw_method_id = $request->withdraw_method_id;
            $user = User::findOrFail($withdraw->user_id);
            $data = ['withdraw' => $withdraw, 'user' => $user];
            $withdraw->save();
            Mail::to($user->email)->send( new RequestWithdraw($data));
            Mail::to('admin@horizontradingco.com')->send( new AdminWithdrawAlert($data));
            return redirect()->route('user.success', $withdraw->id)->with('success_message', 'A withdrawal pin has been sent to your email, please enter your withdrawal pin to facilitate withdrawal/transfer of your fund');
        }
        return redirect()->back()->with('nop', "You can't withdraw less than 50 USD");

    }

    public function success($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        return view('dashboard.withdraw.success', compact('withdraw'));
    }

    public function cancelWithdraw($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->status = -1;
        $withdraw->save();
        return view('dashboard.withdraw.cancel', compact('withdraw'));
    }
}
