<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favorite_item extends Model
{
    public $timestamps = false;

    public function item() {
        return $this->belongsTo(item::class, 'item_id');
    }
}
