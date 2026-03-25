<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'price',
        'sale_price',
        'stock',
        'description',
        'image',
        'is_active',
        'is_delete'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_delete' => 'boolean',
    ];

    // Relationship: Product belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
