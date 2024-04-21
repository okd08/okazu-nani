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
            ['user_id' => 1, 'ingredient_id' => 2, 'quantity' => '2', 'kigen' => 5, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 4, 'quantity' => '1', 'kigen' => 6, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 6, 'quantity' => '1', 'kigen' => 6, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 11, 'quantity' => '1', 'kigen' => 1, 'detail' => '200g'],
            ['user_id' => 1, 'ingredient_id' => 19, 'quantity' => '2', 'kigen' => 14, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 22, 'quantity' => '1/2', 'kigen' => 12, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 25, 'quantity' => '1', 'kigen' => 7, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 28, 'quantity' => '5', 'kigen' => 21, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 38, 'quantity' => '1', 'kigen' => 12, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 45, 'quantity' => '1', 'kigen' => 10, 'detail' => '2本入り'],
            ['user_id' => 1, 'ingredient_id' => 49, 'quantity' => '1', 'kigen' => 7, 'detail' => '500ml'],
            ['user_id' => 1, 'ingredient_id' => 50, 'quantity' => '8', 'kigen' => 12, 'detail' => '10個入りパック'],
            ['user_id' => 1, 'ingredient_id' => 51, 'quantity' => '3', 'kigen' => 6, 'detail' => '1個150g'],
            ['user_id' => 1, 'ingredient_id' => 57, 'quantity' => '3', 'kigen' => 8, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 64, 'quantity' => '3', 'kigen' => 21, 'detail' => ''],
            ['user_id' => 1, 'ingredient_id' => 68, 'quantity' => '1', 'kigen' => 21, 'detail' => '冷凍からあげ 500g'],
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
            ]);
        }
    }
}
