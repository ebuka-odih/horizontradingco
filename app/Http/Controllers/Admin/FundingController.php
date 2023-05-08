<?php

namespace App\Http\Controllers\Admin;

use App\Funding;
use App\Http\Controllers\Controller;
use App\Mail\FundingMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FundingController extends Controller
{
    public function fund()
    {
        $users = User::all();
        return view('admin.user.add-fund', compact('users'));
    }
    public function sendFund(Request $request)
    {
        $data = $this->getData($request);
        $data['user_id'] = $request->user_id;
        $data['status'] = 1;
        $data = Funding::create($data);
        if($request->type == 'btc_balance')
        {
            $user = User::findOrFail($data->user_id);
            $user->btc_balance += $request->amount;
            $user->save();
        }elseif($request->type == 'usdt_balance')
        {
            $user = User::findOrFail($data->user_id);
            $user->usdt_balance += $request->amount;
            $user->save();
        }elseif($request->type == 'eth_balance')
        {
            $user = User::findOrFail($data->user_id);
            $user->eth_balance += $request->amount;
            $user->save();
        }elseif($request->type == 'doge_balance')
        {
            $user = User::findOrFail($data->user_id);
            $user->doge_balance += $request->amount;
            $user->save();
        }elseif($request->type == 'profit')
        {
            $user = User::findOrFail($data->user_id);
            $user->profit += $request->amount;
            $user->save();
        }elseif($request->type == 'ref_bonus')
        {
            $user = User::findOrFail($data->user_id);
            $user->ref_bonus += $request->amount;
            $user->save();
        }
//        Mail::to($data->user->email)->send(new FundingMail($data));
        return redirect()->back()->with('success', "Fund sent successfully");
    }

    protected function getData(Request $request)
    {
        $rules = [
            'type' => 'required',
            'amount' => 'required',
        ];
        return $request->validate($rules);
    }
}
