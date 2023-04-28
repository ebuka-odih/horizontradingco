<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    public function total_return()
    {
        return $this->daily_interest * $this->term_days;
    }
    public function max_deposit()
    {
        if ($this->max_deposit == null)
        {
            return "Unlimited";
        }
        return $this->max_deposit;
    }
}
