<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){

        $user = Auth::user();
        $total_dep = Deposit::whereUserId(\auth()->id())->where('status', 1)->select('amount')->sum('amount');
        return view('dashboard.index', compact('user', 'total_dep'));
    }
}
