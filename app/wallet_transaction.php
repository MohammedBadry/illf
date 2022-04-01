<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet_transaction extends Model
{
    public $timestamps  = false;
    protected $fillable = ['user_id','value','type','created_at'];
}
