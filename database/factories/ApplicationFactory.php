<?php

use Faker\Generator as Faker;

$factory->define(App\Application::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,3),
        'job_id' => $faker->numberBetween(1,2)
    ];
});
