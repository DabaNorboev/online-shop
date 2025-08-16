<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'discount', 'stock_quantity'
    ];

    public function calculateDiscountedPrice(): float
    {
        $price = $this->price;
        $discount = $this->discount;
        return $price * (100 - $discount) / 100;
    }
    public function calculateDiscountValue(): float
    {
        $discount = $this->discount;
        $price = $this->price;
        return $price * ($discount / 100);
    }
}
