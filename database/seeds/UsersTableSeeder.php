<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'テスト太郎',
                'email' => 'test@test.com',
                'password' => bcrypt('password'),
                'profile_text' => 'これは自己紹介文のテストです。',
                'profile_image' => 'https://www.image.com/image01.png',
                'remember_token' => str_random(10),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'name' => 'テスト次朗',
                'email' => 'test2@test.com',
                'password' => bcrypt('password'),
                'profile_text' => 'これは自己紹介文のテスト2です。',
                'profile_image' => 'https://www.image.com/image02.png',
                'remember_token' => str_random(10),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '3',
                'name' => 'テスト応募三郎',
                'email' => 'test3@test.com',
                'password' => bcrypt('password'),
                'profile_text' => 'これは自己紹介文のテスト3です。',
                'profile_image' => 'https://www.image.com/image01.png',
                'remember_token' => str_random(10),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
        factory(App\User::class, 20)->create();

    }
}
