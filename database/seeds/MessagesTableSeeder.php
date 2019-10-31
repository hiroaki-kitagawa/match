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
                'type' => '0',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'sender_id' => '3',
                'job_id' => '2',
                'receiver_id' => '2',
                'text' => 'テスト案件2のメッセージです。',
                'type' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
        factory(App\Message::class, 2)->create();
    }
}
