<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'product_id',
        'order_id',
        'price_at_purchase',
        'discount_at_purchase',
        'quantity',
        'total_price',
    ];

    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function order(): belongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
