<?php

use Faker\Generator as Faker;

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,2),
        'title' => $faker->text(40),
        'type' => $faker->randomElement(['単発案件', 'サービス開発案件']),
        'reward_min' => $faker->numberBetween(5000, 100000),
        'reward_max' => $faker->numberBetween(200000, 1000000),
        'status' => $faker->randomElement(['応募中', '契約済', '終了']),
        'detail' => $faker->text(256),
        'deadline' => $faker->dateTimeBetween($startDate = 'now', $endDate = '45 days')
    ];
});
