<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member_suggestion extends Model
{
    public $timestamps  = false;
    protected $fillable = ['user_id','subject','suggestion','created_at'];
}
