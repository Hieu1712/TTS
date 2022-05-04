<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'note',
        'total_price',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }
}
