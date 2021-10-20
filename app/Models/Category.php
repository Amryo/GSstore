<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'image', 'parent_id', 'status', 'created_at'];

    function Products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    protected static function booted()
    {
        static::creating(function (Category $category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public static function validateRule($id = null)
    {
        return [
            'name' => 'required||max:255|unique:categories,id,' . $id,
            'description' => 'nullable',
            'image' => 'nullable',
            'parent_id' => 'nullable',
            'status' => 'required|in:Active,Draft',

        ];
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
