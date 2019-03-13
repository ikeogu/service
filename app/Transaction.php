<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [ 'user_id',];
    protected $fillable =[
        'user_id',
    ];

    public function plantranction(){
        return $this->belongsTo('App\User');
    }
}
