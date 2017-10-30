<?php

use Illuminate\Database\Seeder;

class RingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=['今日天气实况','当前最新天气实况','空气质量','出行建议','三日天气','七日天气','路况信息','公交信息'];
        foreach ($names as $name) {
            DB::table('rings')->insert([
                'name' => $name
            ]);
        }
    }
}
