<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'image', 'parent_id', 'status'];

    function Products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public static function validateRule($id = null)
    {
        return [
            'name' => 'required||max:255|unique:categories,id,' . $id,
            'description' => 'nullable',
            'image' => 'nullable|image',
            'parent_id' => 'nullable',
            'status' => 'required|in:Active,Draft',

        ];
    }
    public function welcome()
    {
        return 'welcome';
    }
}
