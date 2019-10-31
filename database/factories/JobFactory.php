<?php

use Faker\Generator as Faker;

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,2),
        'title' => $faker->text(40),
        'type' => $faker->numberBetween(0,1),
        'reward_min' => $faker->numberBetween(5000, 100000),
        'reward_max' => $faker->numberBetween(200000, 1000000),
        'status' => $faker->numberBetween(0,2),
        'detail' => $faker->text(256),
    ];
});
