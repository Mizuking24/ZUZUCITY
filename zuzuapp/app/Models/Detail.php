<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        // 'order_id',
        'item_id',
        'amount',
        'price',
        'create_status',
    ];

    public function order() {
        return $this->belongsTo('App\Models\Order');
    }
}
