<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    protected $guarded = [];

    

    public function userplan(){
        return $this->hasOne('App\User');
    }
    public function usertransaction(){
        return $this->hasOneThrough('App\Transaction','App\User');
    }
}

