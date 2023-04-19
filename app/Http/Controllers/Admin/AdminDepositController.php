<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\PaymentWallet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminDepositController extends Controller
{
    public function deposits()
    {
        $deposits = Deposit::all();
        $wallets = PaymentWallet::all();
        $users = User::all();
        return view('admin.transactions.deposits', compact('deposits', 'wallets', 'users'));
    }

    public function approveDeposit($id)
    {
        $deposit = Deposit::findOrFail($id);
        $user = User::findOrFail($deposit->user_id);
        $user->balance += $deposit->amount;
        $user->save();
        $deposit->status = 1;
        $data = ['user' => $user, 'deposit' => $deposit];
        Mail::to($user->email)->send(new ApproveDepositMail($data));
        return redirect()->back()->with('success', "Deposit Approved");
    }

    public function deleteDeposit($id)
    {
        $deposit = PaymentWallet::findOrFail($id);
        $deposit->delete();
        return redirect()->back()->with('deleted', "Deposit deleted");
    }



    public function storeDeposit(Request $request)
    {
        $data = $this->validateData();
        $validatedData = $request->validate($data);

        $project = Deposit::create(
            [
                'amount' => $validatedData['amount'],
                'payment_proof' => $validatedData['payment_proof'] ?? '',
                'payment_wallet_id' => $validatedData['payment_wallet_id'] ?? '',
                'user_id' => $validatedData['user_id'] ?? '',
                'status' => 1,
            ]);

        return redirect()->back();

    }


    private function validateData(): array
    {
        return[
            'amount' => 'required',
            'payment_wallet_id' => 'required',
            'user_id' => 'required',
            'payment_proof' => 'nullable',
        ];
    }
}
