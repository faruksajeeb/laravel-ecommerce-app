<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public $fillable=[
        'id',
        'name',
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'featured',
        'quantity',
        'image',
        'images',
        'category_id',
        'subcategory_id',
        'brand_id',
        'size',
        'color',
        'status',
        'created_by',
        'updated_by'
    ];
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Option::class, 'product_tag', 'product_id', 'tag_id');
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }
   
}
