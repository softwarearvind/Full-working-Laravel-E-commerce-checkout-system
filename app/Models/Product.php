<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

          'name',
        'category_id',
        'brand_id',
        'price',
        'quantity',
        'status',
        'description',
        'image',

];

 public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Brand Relationship
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function carts()
{
    return $this->hasMany(Cart::class);
}

public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
}
