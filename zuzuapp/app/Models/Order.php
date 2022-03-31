<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'postal_code',
        'address',
        'payment_method',
        'delivery_charge',
        'order_status',
        'billing_amount',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function details() {
        return $this->hasMany('App\Models\Detail');
    }
}
