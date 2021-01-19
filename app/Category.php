<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_name'];
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
