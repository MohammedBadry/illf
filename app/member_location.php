<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member_location extends Model
{
    public $timestamps  = false;
    protected $fillable = ['user_id','name','country','city','area','phone','alternativephone','street','building','floor','flat','placemark','notes','created_at'];
}
