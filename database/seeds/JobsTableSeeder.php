<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();
        DB::table('jobs')->insert([
            [
                'id' => '1',
                'user_id' => '1',
                'title' => 'テスト案件1',
                'type' => '単発案件',
                'reward_min' => '100000',
                'reward_max' => '200000',
                'status' => '応募中',
                'detail' => 'テスト単発案件のお仕事です。',
                'deadline' => $carbon->today()->addDays(30),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'title' => 'テスト案件2',
                'type' => 'サービス開発案件',
                'reward_min' => '500000',
                'reward_max' => '700000',
                'status' => '応募中',
                'detail' => 'テストサービス開発案件のお仕事です。',
                'deadline' => $carbon->today()->addDays(30),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '3',
                'user_id' => '1',
                'title' => 'テスト案件3',
                'type' => '単発案件',
                'reward_min' => '100000',
                'reward_max' => '200000',
                'status' => '契約済',
                'detail' => 'テストサービス開発案件のお仕事です。',
                'deadline' => $carbon->today()->addDays(30),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '4',
                'user_id' => '2',
                'title' => 'テスト案件4',
                'type' => 'サービス開発案件',
                'reward_min' => '300000',
                'reward_max' => '600000',
                'status' => '終了',
                'detail' => 'テストサービス開発案件のお仕事です。',
                'deadline' => $carbon->today()->addDays(30),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
        factory(App\Job::class, 10)->create();
    }
}
