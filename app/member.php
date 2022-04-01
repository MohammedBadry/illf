<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class member extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $fillable = [
       'role','type','name', 'phone','email','password','company','job','country','city','area','classfication','wallet','registercode','activate','user_hash',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

