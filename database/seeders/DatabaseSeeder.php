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
        // \App\Models\User::factory(10)->create();
        // Category::factory(10)->create();
        //  Product::factory(10)->create();
        $this->call([
            CategoriesTableSeeder::class, ProductTableSeeder::class
        ]);
        //    Category::create(
        /* [
                'name' => 'Clocks',
                'slug' => 'clocks',
                'description' => 'new clocks ',
                'status' => $status[rand(0, 1)],
            ],*/

        //      [
        //          'name' => 'Mobiles',
        //          'slug' => 'mobiles',
        //          'description' => 'new mobiles ',
        //          'status' => $status[rand(0, 1)],
        //     ]
        //   );  
        Product::create(
            /* [
                'name' => 'Casio',
                'slug' => 'casio',
                'description' => 'Product from  clocks ',
                'status' => $status[rand(0, 1)],
                'price' => $price,
                'sale_price' => $price_sale,
                'quantity' => rand(1, 100),
                'weight' => rand(1, 30),
                'height' => rand(1, 100),
                'wedth' => rand(1, 100),
                'length' => rand(1, 100),
                'sku' => 'qw#4fasc',
                'category_id' => rand(1, 2),

            ],*/

            [
                'name' => 'Hp Lartop',
                'slug' => 'hp-laptop',
                'description' => 'Hp laptop very fast ',
                'status' => $status[rand(0, 1)],
                'price' => $price,
                'sale_price' => $price_sale,
                'quantity' => rand(1, 100),
                'weight' => rand(1, 30),
                'height' => rand(1, 100),
                'wedth' => rand(1, 100),
                'length' => rand(1, 100),
                'sku' => 'qw#5fasc',
                'category_id' => rand(1, 2),
            ]
        );
    }
}
