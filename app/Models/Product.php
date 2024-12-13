<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Mass assignable attributes
    protected $fillable = ['nama', 'price', 'description', 'stock', 'image'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
