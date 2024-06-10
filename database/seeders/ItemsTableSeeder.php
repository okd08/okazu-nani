<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //DB操作をするためのファザード
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['user_id' => 1, 'ingredient_id' => 6, 'quantity' => 1, 'kigen' => 21, 'detail' => '冷凍', 'created_at' => '2024-06-03 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 5, 'quantity' => 1, 'kigen' => 21, 'detail' => '冷凍', 'created_at' => '2024-06-03 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 3, 'quantity' => 1, 'kigen' => 21, 'detail' => '冷凍', 'created_at' => '2024-06-03 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 21, 'quantity' => 3, 'kigen' => 14, 'detail' => '', 'created_at' => '2024-06-01 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 19, 'quantity' => 2, 'kigen' => 14, 'detail' => '', 'created_at' => '2024-06-01 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 20, 'quantity' => 1, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-01 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 7, 'quantity' => 1, 'kigen' => 21, 'detail' => '冷凍、300g', 'created_at' => '2024-06-03 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 6, 'quantity' => 2, 'kigen' => 21, 'detail' => '冷凍', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 5, 'quantity' => 2, 'kigen' => 21, 'detail' => '冷凍', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 2, 'quantity' => 1, 'kigen' => 21, 'detail' => '冷凍', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 23, 'quantity' => 1, 'kigen' => 14, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 20, 'quantity' => 1, 'kigen' => 14, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 24, 'quantity' => 1, 'kigen' => 7, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 25, 'quantity' => 2, 'kigen' => 7, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 11, 'quantity' => 2, 'kigen' => 2, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 31, 'quantity' => 3, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 36, 'quantity' => 1, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 27, 'quantity' => 1, 'kigen' => 14, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 45, 'quantity' => 2, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 44, 'quantity' => 1, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 29, 'quantity' => 3, 'kigen' => 21, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 49, 'quantity' => 2, 'kigen' => 7, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 50, 'quantity' => 10, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-10 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 51, 'quantity' => 3, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-05 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 53, 'quantity' => 1, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-05 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 57, 'quantity' => 1, 'kigen' => 10, 'detail' => '', 'created_at' => '2024-06-05 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 68, 'quantity' => 1, 'kigen' => 21, 'detail' => 'サバの味噌煮', 'created_at' => '2024-06-03 12:00:00'],
            ['user_id' => 1, 'ingredient_id' => 69, 'quantity' => 1, 'kigen' => 21, 'detail' => 'エビフライ', 'created_at' => '2024-06-03 12:00:00'],
        ];

        foreach ($items as $item) {
            // 期限の日数を加算して日付を計算
            $expiration_date = Carbon::now()->addDays($item['kigen']);
            DB::table('items')->insert([
                'user_id' => $item['user_id'],
                'ingredient_id' => $item['ingredient_id'],
                'quantity' => $item['quantity'],
                'kigen' => $item['kigen'],
                'detail' => $item['detail'],
                'expiration_date' => $expiration_date,
                'created_at' => $item['created_at'],
            ]);
        }
    }
}
