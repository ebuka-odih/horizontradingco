<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentWallet;
use Illuminate\Http\Request;

class AdminPaymentWalletController extends Controller
{
    public function index()
    {
        $wallets = PaymentWallet::all();
        return view('admin.others.wallets', compact('wallets'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = $this->getData($request);
        PaymentWallet::create($data);
        return redirect()->back()->with('success', "Wallet Added Successfully");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $wallet = PaymentWallet::findOrFail($id);
        $wallet->delete();
        return redirect()->back()->with('deleted', "Wallet Deleted");
    }

    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
        ];
        return $request->validate($rules);
    }
}
