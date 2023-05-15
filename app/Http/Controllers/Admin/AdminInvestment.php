<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Package;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminInvestment extends Controller
{
    public function investments()
    {
        $investments = Investment::all();
        return view('admin.transactions.investments', compact('investments'));
    }

    public function investmentDetails($id)
    {

        $deposit_detail = Investment::findOrFail($id);
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


        return view('admin.transactions.investment-details', compact('deposit_detail', 'investment_plan', 'profit', 'days', 'i'));

    }
}
