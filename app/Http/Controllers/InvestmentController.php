<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Investment;
use App\Package;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{

    public function investments()
    {
        $investments = Investment::whereUserId(\auth()->id())->latest()->paginate(6);
        return view('dashboard.invest.investments', compact('investments'));
    }
    public function plans()
    {
        $plans = Package::all();
        return view('dashboard.invest.plans', compact('plans'));
    }

    public function invest(Request $request)
    {
//        return $request;
        $id = $request->package_id;
        $plan = Package::findOrFail($id);
        return view('dashboard.invest.invest', compact('plan'));
    }

    public function processInvest(Request $request)
    {
//        return $request;
        $invest = new Investment();
        if($request->balance == "balance"){
            if ($request->amount < auth()->user()->balance)
            {
                $plan_id = Package::findOrFail($request->package_id);
                if ($request->get('amount') < $plan_id->min_deposit || $request->get('amount') > $plan_id->max_deposit())
                {
                    return redirect()->back()->with('declined', "Please enter the amount within the Min/Max Deposit");
                }else{
                    $invest->package_id = $request->package_id;
                    $invest->user_id = Auth::id();
                    $invest->amount = $request->amount;
                    $invest->status = 1;
                    $user = User::findOrFail($invest->user_id);
                    $user->balance -= $request->amount;
                    $user->save();
                    $invest->save();
                    return redirect()->route('user.investmentDetails', $invest->id);
                }
            }
            return redirect()->back()->with('insufficient', "Sorry! You do not have upto that amount in your Main balance");

        }
        elseif($request->balance == "btc_balance"){
            if ($request->amount < auth()->user()->btc_balance)
            {
                $plan_id = Package::findOrFail($request->package_id);
                if ($request->get('amount') < $plan_id->min_deposit || $request->get('amount') > $plan_id->max_deposit())
                {
                    return redirect()->back()->with('declined', "Please enter the amount within the Min/Max Deposit");
                }else{
                    $invest->package_id = $request->package_id;
                    $invest->user_id = Auth::id();
                    $invest->amount = $request->amount;
                    $invest->status = 1;
                    $user = User::findOrFail($invest->user_id);
                    $user->btc_balance -= $request->amount;
                    $user->save();
                    $invest->save();
                    return redirect()->route('user.investmentDetails', $invest->id);
                }
            }
            return redirect()->back()->with('insufficient', "Sorry! You do not have upto that amount in your Bitcoin balance");

        }
        elseif($request->balance == "eth_balance"){
            if ($request->amount < auth()->user()->eth_balance)
            {
                $plan_id = Package::findOrFail($request->package_id);
                if ($request->get('amount') < $plan_id->min_deposit || $request->get('amount') > $plan_id->max_deposit())
                {
                    return redirect()->back()->with('declined', "Please enter the amount within the Min/Max Deposit");
                }else{
                    $invest->package_id = $request->package_id;
                    $invest->user_id = Auth::id();
                    $invest->amount = $request->amount;
                    $invest->status = 1;
                    $user = User::findOrFail($invest->user_id);
                    $user->eth_balance -= $request->amount;
                    $user->save();
                    $invest->save();
                    return redirect()->route('user.investmentDetails', $invest->id);
                }
            }
            return redirect()->back()->with('insufficient', "Sorry! You do not have upto that amount in your Ethereum balance");

        }
        elseif($request->balance == "usdt_balance"){
            if ($request->amount < auth()->user()->usdt_balance)
            {
                $plan_id = Package::findOrFail($request->package_id);
                if ($request->get('amount') < $plan_id->min_deposit || $request->get('amount') > $plan_id->max_deposit())
                {
                    return redirect()->back()->with('declined', "Please enter the amount within the Min/Max Deposit");
                }else{
                    $invest->package_id = $request->package_id;
                    $invest->user_id = Auth::id();
                    $invest->amount = $request->amount;
                    $invest->status = 1;
                    $user = User::findOrFail($invest->user_id);
                    $user->usdt_balance -= $request->amount;
                    $user->save();
                    $invest->save();
                    return redirect()->route('user.investmentDetails', $invest->id);
                }
            }
            return redirect()->back()->with('insufficient', "Sorry! You do not have upto that amount in your USDT balance");

        }elseif($request->balance == "doge_balance"){
            if ($request->amount < auth()->user()->doge_balance)
            {
                $plan_id = Package::findOrFail($request->package_id);
                if ($request->get('amount') < $plan_id->min_deposit || $request->get('amount') > $plan_id->max_deposit())
                {
                    return redirect()->back()->with('declined', "Please enter the amount within the Min/Max Deposit");
                }else{
                    $invest->package_id = $request->package_id;
                    $invest->user_id = Auth::id();
                    $invest->amount = $request->amount;
                    $invest->status = 1;
                    $user = User::findOrFail($invest->user_id);
                    $user->doge_balance -= $request->amount;
                    $user->save();
                    $invest->save();
                    return redirect()->route('user.investmentDetails', $invest->id);
                }
            }
            return redirect()->back()->with('insufficient', "Sorry! You do not have upto that amount in your Doge balance");

        }
        return redirect()->back()->with('wallet', "Select A Wallet Account");

    }


    public function investmentDetails($id)
    {

        $deposit_detail = Investment::whereUserId(auth()->id())->findOrFail($id);
        $investment_plan = Package::findOrFail($deposit_detail->package_id);
        $user = User::findOrFail($deposit_detail->user_id);
        $expected_profit = $investment_plan->total_return()  * $deposit_detail->amount;
        $profit =  number_format((float)$expected_profit / 100, 2, '.', '');

        $expected_percent = $investment_plan->daily_interest  * $deposit_detail->amount;
        $profit_percent =  number_format((float)$expected_percent / 100, 2, '.', '');

        $days = 1;

        $current_date = Carbon::now();
        $d_approved = Carbon::parse($deposit_detail->updated_at);
        $d_ended = Carbon::parse($deposit_detail->end_date);

        if($d_approved->diffInDays($current_date) < $investment_plan->term_days){
            $days = $d_approved->diffInDays($current_date);
        }else {
            $days =  $investment_plan->term_days;
        }

        $i = 1;
        while ($i < $days){
            $i++;
        }


        return view('dashboard.invest.investment-details', compact('deposit_detail', 'investment_plan', 'profit', 'days', 'i'));

    }


}
