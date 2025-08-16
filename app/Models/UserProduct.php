<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProduct extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getTotalPrice(): float
    {
        return $this->product->price * $this->quantity;
    }

    public function getTotalDiscountedPrice(): float
    {
        return $this->product->calculateDiscountedPrice() * $this->quantity;
    }

    public function getTotalDiscountValue(): float
    {
        return $this->product->calculateDiscountValue() * $this->quantity;
    }
}
