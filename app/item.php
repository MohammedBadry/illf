<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
  public $timestamps = false;


    public function cat()
    {
        return $this->belongsTo(category::class, 'category');
    }

    public function subcat()
    {
        return $this->belongsTo(category::class, 'subcategory');
    }

    public function subsubcat()
    {
        return $this->belongsTo(category::class, 'subsubcategory');
    }

    public function images()
    {
        return $this->hasMany(item_image::class);
    }

    public function image()
    {
        return $this->hasOne(item_image::class);
    }
}
