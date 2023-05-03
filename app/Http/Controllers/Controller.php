<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Investment;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function add_bonus()
    {

        $deposits = Investment::whereUserId(auth()->id())->whereCompleted(false)->get();

        if($deposits){
            foreach ($deposits as $deposit_detail){
                $user = auth()->user();
                $current_date = Carbon::now();
                $d_ended = Carbon::parse($deposit_detail->end_date);

                if($current_date->isoFormat('MMMM Do YYYY') == $d_ended->isoFormat('MMMM Do YYYY')){
                    $user->profit += $deposit_detail->earning;
                    $user->save();
                    $deposit_detail->completed = true;
                    $deposit_detail->save();

                }
            }return 1;

        }else{
            return 0;
        }


    }

}
