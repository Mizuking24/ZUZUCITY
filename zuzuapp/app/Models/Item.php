<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'image_id',
        'introduction',
        'price',
        'is_active',
    ];

    public function carts() {
        return $this->hasMany('App\Models\Cart');
    }
}
