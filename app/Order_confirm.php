<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_confirm extends Model
{
    protected $table = 'orders_confirm';
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
