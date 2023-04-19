<?php

namespace App\Http\Controllers;

use App\Mail\AdminDepositAlert;
use App\Models\Deposit;
use App\Models\PaymentWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DepositController extends Controller
{
    public function deposit()
    {
        $payment_wallet = PaymentWallet::all();
        return view('dashboard.deposit.deposit', compact('payment_wallet'));
    }

    public function processDeposit(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'payment_wallet_id' => 'required'
        ]);
        if ($request->amount < 50){
            return redirect()->back()->with('declined', "Entered Amount is Less Than $100.00");
        }
        $deposit = new Deposit();
        $deposit->amount = $request->amount;
        $deposit->payment_wallet_id = $request->payment_wallet_id;
        $deposit->user_id = Auth::id();
        $deposit->save();
        return redirect()->route('user.payment', $deposit->id);

    }

    public function payment($id)
    {
        $deposit = Deposit::findOrFail($id);
        return view('dashboard.deposit.payment', compact('deposit'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
                'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            ]
        );
        if ($request->hasFile('payment_proof')){
            $image = $request->file('payment_proof');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/proof');
            $image->move($destinationPath, $input['imagename']);

            $id = $request->deposit_id;
            $deposit = Deposit::findOrFail($id);
            $deposit->update(['payment_proof' => $input['imagename'] ]);
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AdminDepositAlert($deposit));
            return redirect()->back()->with('success', "Transaction Sent, Awaiting Approval ");
        }
        return redirect()->back()->with('declined', "Please Upload Your Payment Screenshot ");

    }



}
