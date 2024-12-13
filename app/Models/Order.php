<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Mass assignable attributes
    protected $fillable = ['product_id', 'user_id', 'quantity', 'status', 'total_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}