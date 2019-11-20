<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'id' => '1',
                'user_id' => '1',
                'job_id' => '1',
                'text' => 'テスト案件1のメッセージです。',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'user_id' => '3',
                'job_id' => '2',
                'text' => 'テスト案件2のメッセージです。',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '3',
                'user_id' => '3',
                'job_id' => '3',
                'text' => 'テスト案件3のメッセージです。',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '4',
                'user_id' => '3',
                'job_id' => '2',
                'text' => 'テスト案件4のメッセージです。',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '5',
                'user_id' => '1',
                'job_id' => '1',
                'text' => 'テスト案件1のメッセージです。',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '6',
                'user_id' => '1',
                'job_id' => '2',
                'text' => 'テスト案件2のメッセージです。',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
        // factory(App\Message::class, 200)->create();
    }
}
