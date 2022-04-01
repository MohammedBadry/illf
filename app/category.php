<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps = false;

    public function items() {
        return $this->hasMany(item::class, 'category');
    }
}
