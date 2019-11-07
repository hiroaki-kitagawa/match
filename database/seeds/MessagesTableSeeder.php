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
                'sender_id' => '1',
                'job_id' => '1',
                'receiver_id' => null,
                'text' => 'テスト案件1のメッセージです。',
                'type' => '公開',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'sender_id' => '3',
                'job_id' => '2',
                'receiver_id' => '2',
                'text' => 'テスト案件2のメッセージです。',
                'type' => 'DM',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '3',
                'sender_id' => '3',
                'job_id' => '3',
                'receiver_id' => '1',
                'text' => 'テスト案件3のメッセージです。',
                'type' => 'DM',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '4',
                'sender_id' => '3',
                'job_id' => '4',
                'receiver_id' => '2',
                'text' => 'テスト案件4のメッセージです。',
                'type' => 'DM',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
