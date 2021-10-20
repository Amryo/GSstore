<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function Products()
    {
        return $this->belongsToMany(Product::class, 'order_items')->using(OrderItem::class)
            ->as('items')
            ->withPivot(['quantity', 'price']);
    }

    public static function booted()
    {
        static::observe(OrderObserver::class);
    }
}
