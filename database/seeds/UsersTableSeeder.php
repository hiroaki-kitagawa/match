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
                'name' => '鈴木一郎',
                'email' => 'test@test.com',
                'password' => bcrypt('password'),
                'profile_text' => '主にWeb制作・開発に関わる案件を募集します。',
                'profile_image' => 'faceicon1.png',
                'remember_token' => str_random(10),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'name' => '佐藤拓也',
                'email' => 'test2@test.com',
                'password' => bcrypt('password'),
                'profile_text' => 'HTML/CSS/javascript/PHP,FWはCakePHP,Laravelを得意としています。',
                'profile_image' => 'faceicon2.png',
                'remember_token' => str_random(10),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '3',
                'name' => '田原優子',
                'email' => 'test3@test.com',
                'password' => bcrypt('password'),
                'profile_text' => '元Webデザイナーで現在は主婦です。Illustrator,Photoshop,HTML/CSS/JQueryの経験があります。',
                'profile_image' => 'faceicon3.png',
                'remember_token' => str_random(10),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
        // factory(App\User::class, 20)->create();

    }
}
