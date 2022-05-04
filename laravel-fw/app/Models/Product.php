<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'image_url',
        'name',
        'descripti',
        'price',
        'quantity',
        'product_sold',
        'status',
    ];

    protected $table = 'product';

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products');
    }
}
