<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $timestamps = false;

    protected $fillable = [ 'order_number','order_owner', 'shipping', 'status', 'created_at' ];
}
