<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'id' => '1',
                'user_id' => '1',
                'title' => 'テスト案件1',
                'type' => '0',
                'reward_min' => '100000',
                'reward_max' => '200000',
                'status' => '0',
                'detail' => 'テスト単発案件のお仕事です。',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'title' => 'テスト案件2',
                'type' => '1',
                'reward_min' => '500000',
                'reward_max' => '700000',
                'status' => '1',
                'detail' => 'テストサービス開発案件のお仕事です。',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
        factory(App\Job::class, 2)->create();
    }
}
