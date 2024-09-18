<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = DB::table('orders')->pluck('id')->toArray();
        $products = DB::table('products')->pluck('id')->toArray();
        $orderDetails = [];

        // Generate fake data for order details
        for ($i = 0; $i < 20; $i++) { // Example: creating 20 order details
            $orderDetails[] = [
                'order_id' => $orders[array_rand($orders)],
                'product_id' => $products[array_rand($products)],
                'quantity' => rand(1, 5), // Example quantity range
                'price' => rand(100, 1000), // Example price range
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('order_details')->insert($orderDetails);
    }
}
