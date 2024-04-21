<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //DB操作をするためのファザード

class MemosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memo = [
            'user_id' => 1,
            'memo' => '次の買い物で買うものなどをメモできます。',
        ];
        DB::table('memos')->insert($memo);
    }
}
