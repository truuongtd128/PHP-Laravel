<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id')->toArray();
        $orders = [];
        for ($i = 0; $i < 10; $i++) {
            $orders[] = [
                'user_id' => $userIds[array_rand($userIds)],
                'total_amount' => fake()->randomFloat(2, 50, 1000), 
                'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
                'order_date' => fake()->dateTime(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('orders')->insert($orders);
    }
}
