<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $status = ['Active', 'Draft'];

        $price = rand(800, 1000);
        $price_sale = $price - 45;
        $this->call([
            CategoriesTableSeeder::class, ProductTableSeeder::class
        ]);
        Product::create(
            [
                'name' => 'Elctronic',
                'slug' => 'Elctronic',
                'description' => 'Hp laptop very fast',
                'status' => $status[rand(0, 1)],
                'price' => $price,
                'sale_price' => $price_sale,
                'quantity' => rand(1, 100),
                'weight' => rand(1, 30),
                'height' => rand(1, 100),
                'wedth' => rand(1, 100),
                'length' => rand(1, 100),
                'sku' => 'Avsscs',
                'category_id' => rand(1, 2),
            ]
        
            );
    }
}
