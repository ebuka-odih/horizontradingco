<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_wallet()
    {
        return $this->belongsTo(PaymentWallet::class, 'payment_wallet_id');
    }

    public function status()
    {
        if ($this->status == 0){
            return "<span class='badge badge-warning text text-uppercase'>Pending</span>";
        }elseif ($this->status == 1){
            return "<span class='badge badge-success text text-uppercase'>Successful</span>";
        }else{
            return "<span class='badge badge-danger text text-uppercase'>Canceled</span>";
        }
    }
    public function adminStatus()
    {
        if ($this->status == 0){
            return "<span class='badge bg-warning text text-uppercase'>Pending</span>";
        }elseif ($this->status == 1){
            return "<span class='badge bg-success text text-uppercase'>Successful</span>";
        }else{
            return "<span class='badge bg-danger text text-uppercase'>Canceled</span>";
        }
    }
}
