<?php

use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            [
                'id' => '1',
                'user_id' => '3',
                'user_name' => '田原優子',
                'job_id' => '1',
                'owner_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'user_id' => '3',
                'user_name' => '田原優子',
                'job_id' => '2',
                'owner_id' => '2',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '3',
                'user_id' => '3',
                'user_name' => '田原優子',
                'job_id' => '3',
                'owner_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '4',
                'user_id' => '3',
                'user_name' => '田原優子',
                'job_id' => '4',
                'owner_id' => '2',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
        // factory(App\Application::class, 10)->create();
    }
}
