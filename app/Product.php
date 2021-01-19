<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        if (substr($this->image, 0, 5) == 'https') {

            return $this->image;
        }
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function order_detail()
    {
        return $this->hasMany(Orders_detail::class);
    }
}
