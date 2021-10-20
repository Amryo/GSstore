<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $fillable = ['product_id', 'quantity', 'price', 'order_id'];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
