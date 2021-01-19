<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
        return $this->hasMany(Orders_detail::class);
    }

    public function order_confirm()
    {
        return $this->hasOne(Order_confirm::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
