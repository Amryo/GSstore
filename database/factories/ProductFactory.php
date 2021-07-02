<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(1, true);
        $status = ['Active', 'Draft'];
        $category = DB::table('categories')->inRandomOrder()->limit(1)->first(['id']);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->words(40, true),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomDigit(),
            'sale_price' => $this->faker->randomDigit(),
            'quantity' => $this->faker->randomDigit(),
            'status' => $status[rand(0, 1)],
            'weight' => $this->faker->randomNumber(3, true),
            'height' => $this->faker->randomNumber(3, true),
            'wedth' => $this->faker->randomNumber(3, true),
            'length' => $this->faker->randomNumber(3, true),
            'sku' => $this->faker->uuid(),
            'category_id' => $category,

        ];
    }
}
