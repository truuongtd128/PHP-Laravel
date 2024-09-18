<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $products = [];
        for ($i = 0; $i < 10; $i++) {
            $products[] = [
                'name' => fake()->name(),
                'description' => fake()->sentence(),
                'price' => fake()->randomFloat(2, 10, 10000), // Example range for price
                'image' => fake()->imageUrl(640, 480, 'category', true),
                'category_id' => $categoryIds[array_rand($categoryIds)],
                
            ];
        }

        DB::table('products')->insert($products);
    }
}
