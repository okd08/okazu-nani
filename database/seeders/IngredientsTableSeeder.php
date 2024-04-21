<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //DB操作をするためのファザード

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            // 肉
            ['category' => 'niku', 'name' => '牛ステーキ', 'image' => '/images/meat/gyu_steak.png', 'tanni' =>'枚'],
            ['category' => 'niku', 'name' => '牛バラ', 'image' => '/images/meat/gyu_bara.png', 'tanni' =>'パック'],
            ['category' => 'niku', 'name' => '牛コマ', 'image' => '/images/meat/gyu_koma.png', 'tanni' =>'パック'],
            ['category' => 'niku', 'name' => '豚ロース', 'image' => '/images/meat/buta_rosu.png', 'tanni' =>'枚'],
            ['category' => 'niku', 'name' => '豚バラ', 'image' => '/images/meat/buta_bara.png', 'tanni' =>'パック'],
            ['category' => 'niku', 'name' => '鶏モモ', 'image' => '/images/meat/tori_momo.png', 'tanni' =>'パック'],
            ['category' => 'niku', 'name' => 'ひき肉', 'image' => '/images/meat/hikiniku.png', 'tanni' =>'パック'],
            ['category' => 'niku', 'name' => 'その他肉類', 'image' => '/images/meat/other.png', 'tanni' =>'個'],
            // 魚
            ['category' => 'sakana', 'name' => '切り身各種', 'image' => '/images/fish/kirimi.png', 'tanni' =>'個'],
            ['category' => 'sakana', 'name' => 'マグロ刺身', 'image' => '/images/fish/maguro.png', 'tanni' =>'パック'],
            ['category' => 'sakana', 'name' => 'サーモン刺身', 'image' => '/images/fish/salmon.png', 'tanni' =>'パック'],
            ['category' => 'sakana', 'name' => 'ブリ刺身', 'image' => '/images/fish/buri.png', 'tanni' =>'パック'],
            ['category' => 'sakana', 'name' => 'ハマチ刺身', 'image' => '/images/fish/hamachi.png', 'tanni' =>'パック'],
            ['category' => 'sakana', 'name' => 'タイ刺身', 'image' => '/images/fish/tai.png', 'tanni' =>'パック'],
            ['category' => 'sakana', 'name' => 'エビ', 'image' => '/images/fish/ebi.png', 'tanni' =>'パック'],
            ['category' => 'sakana', 'name' => 'イカ', 'image' => '/images/fish/ika.png', 'tanni' =>'パック'],
            ['category' => 'sakana', 'name' => 'タコ', 'image' => '/images/fish/tako.png', 'tanni' =>'パック'],
            ['category' => 'sakana', 'name' => 'その他魚類', 'image' => '/images/fish/other.png', 'tanni' =>'個'],
            // 野菜
            ['category' => 'yasai', 'name' => '人参', 'image' => '/images/vegetable/ninjin.png', 'tanni' =>'本'],
            ['category' => 'yasai', 'name' => 'キャベツ', 'image' => '/images/vegetable/cabbage.png', 'tanni' =>'玉'],
            ['category' => 'yasai', 'name' => '玉ねぎ', 'image' => '/images/vegetable/onion.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => '大根', 'image' => '/images/vegetable/daikon.png', 'tanni' =>'本'],
            ['category' => 'yasai', 'name' => '白菜', 'image' => '/images/vegetable/hakusai.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => 'ほうれん草', 'image' => '/images/vegetable/hourensou.png', 'tanni' =>'束'],
            ['category' => 'yasai', 'name' => '白ネギ', 'image' => '/images/vegetable/negi.png', 'tanni' =>'本'],
            ['category' => 'yasai', 'name' => 'なす', 'image' => '/images/vegetable/nasu.png', 'tanni' =>'本'],
            ['category' => 'yasai', 'name' => 'ニラ', 'image' => '/images/vegetable/nira.png', 'tanni' =>'束'],
            ['category' => 'yasai', 'name' => 'じゃがいも', 'image' => '/images/vegetable/poteto.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => 'さつまいも', 'image' => '/images/vegetable/satsumaimo.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => 'ごぼう', 'image' => '/images/vegetable/gobou.png', 'tanni' =>'本'],
            ['category' => 'yasai', 'name' => 'トマト', 'image' => '/images/vegetable/tomato.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => 'とうもろこし', 'image' => '/images/vegetable/corn.png', 'tanni' =>'本'],
            ['category' => 'yasai', 'name' => 'いんげん', 'image' => '/images/vegetable/ingen.png', 'tanni' =>'袋'],
            ['category' => 'yasai', 'name' => 'かぼちゃ', 'image' => '/images/vegetable/kabocha.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => 'きゅうり', 'image' => '/images/vegetable/kyuuri.png', 'tanni' =>'本'],
            ['category' => 'yasai', 'name' => 'アスパラガス', 'image' => '/images/vegetable/asparagus.png', 'tanni' =>'束'],
            ['category' => 'yasai', 'name' => 'アボカド', 'image' => '/images/vegetable/avocado.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => 'ブロッコリー', 'image' => '/images/vegetable/broccoli.png', 'tanni' =>'株'],
            ['category' => 'yasai', 'name' => 'オクラ', 'image' => '/images/vegetable/okura.png', 'tanni' =>'袋'],
            ['category' => 'yasai', 'name' => 'パプリカ', 'image' => '/images/vegetable/paprika.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => 'ピーマン', 'image' => '/images/vegetable/piman.png', 'tanni' =>'個'],
            ['category' => 'yasai', 'name' => 'たけのこ', 'image' => '/images/vegetable/takenoko.png', 'tanni' =>'本'],
            ['category' => 'yasai', 'name' => 'その他野菜類', 'image' => '/images/vegetable/other.png', 'tanni' =>'個'],
            // きのこ
            ['category' => 'kinoko', 'name' => 'えのき', 'image' => '/images/kinoko/enoki.png', 'tanni' =>'パック'],
            ['category' => 'kinoko', 'name' => 'エリンギ', 'image' => '/images/kinoko/eringi.png', 'tanni' =>'袋'],
            ['category' => 'kinoko', 'name' => 'まいたけ', 'image' => '/images/kinoko/maitake.png', 'tanni' =>'袋'],
            ['category' => 'kinoko', 'name' => 'しいたけ', 'image' => '/images/kinoko/shiitake.png', 'tanni' =>'袋'],
            ['category' => 'kinoko', 'name' => 'しめじ', 'image' => '/images/kinoko/shimeji.png', 'tanni' =>'袋'],
            // その他
            ['category' => 'other', 'name' => '牛乳', 'image' => '/images/other/milk.png', 'tanni' =>'本'],
            ['category' => 'other', 'name' => 'たまご', 'image' => '/images/other/tamago.png', 'tanni' =>'個'],
            ['category' => 'other', 'name' => '豆腐', 'image' => '/images/other/tofu.png', 'tanni' =>'丁'],
            ['category' => 'other', 'name' => '油揚げ', 'image' => '/images/other/aburaage.png', 'tanni' =>'枚'],
            ['category' => 'other', 'name' => '厚揚げ', 'image' => '/images/other/atsuage.png', 'tanni' =>'枚'],
            ['category' => 'other', 'name' => 'ちくわ', 'image' => '/images/other/chikuwa.png', 'tanni' =>'本'],
            ['category' => 'other', 'name' => 'こんにゃく', 'image' => '/images/other/konnyaku.png', 'tanni' =>'枚'],
            ['category' => 'other', 'name' => '糸こんにゃく', 'image' => '/images/other/itokonnyaku.png', 'tanni' =>'袋'],
            ['category' => 'other', 'name' => '納豆', 'image' => '/images/other/nattou.png', 'tanni' =>'パック'],
            ['category' => 'other', 'name' => 'キムチ', 'image' => '/images/other/kimuchi.png', 'tanni' =>'パック'],
            ['category' => 'other', 'name' => 'ベーコン', 'image' => '/images/other/bacon.png', 'tanni' =>'パック'],
            ['category' => 'other', 'name' => 'ハム', 'image' => '/images/other/ham.png', 'tanni' =>'パック'],
            ['category' => 'other', 'name' => 'もち', 'image' => '/images/other/mochi.png', 'tanni' =>'個'],
            ['category' => 'other', 'name' => 'うどん', 'image' => '/images/other/udon.png', 'tanni' =>'袋'],
            ['category' => 'other', 'name' => 'そば', 'image' => '/images/other/soba.png', 'tanni' =>'袋'],
            ['category' => 'other', 'name' => '焼きそば', 'image' => '/images/other/yakisoba.png', 'tanni' =>'袋'],
            ['category' => 'other', 'name' => 'レトルト食品', 'image' => '/images/other/retort.png', 'tanni' =>'袋'],
            ['category' => 'other', 'name' => '惣菜', 'image' => '/images/other/souzai.png', 'tanni' =>'個'],
            ['category' => 'other', 'name' => 'その他の食品', 'image' => '/images/other/other.png', 'tanni' =>'個'],
            // 冷凍
            ['category' => 'reitou', 'name' => '冷凍惣菜', 'image' => '/images/reitou/souzai.png', 'tanni' =>'袋'],
            ['category' => 'reitou', 'name' => '冷凍揚げ物', 'image' => '/images/reitou/agemono.png', 'tanni' =>'袋'],
            ['category' => 'reitou', 'name' => '冷凍魚', 'image' => '/images/reitou/sakana.png', 'tanni' =>'袋'],
            ['category' => 'reitou', 'name' => 'その他冷凍食品', 'image' => '/images/reitou/okazu.png', 'tanni' =>'個'],
        ];

        foreach ($ingredients as $ingredient) {
            DB::table('ingredients')->insert($ingredient);
        }
    }
}
