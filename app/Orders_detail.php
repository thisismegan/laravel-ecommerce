<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_detail extends Model
{
    protected $table = 'orders_detail';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
