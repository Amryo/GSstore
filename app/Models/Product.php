<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'image', 'category_id', 'price', 'sale_price', 'quantity', 'weight', 'height', 'wedth', 'length ', 'sku', 'status'];

    protected $perPage = 5;
    function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
