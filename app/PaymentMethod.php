<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = [];

    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }



}
