<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,23),
        'job_id' => $faker->numberBetween(1,2),
        'text' => $faker->text(100),
    ];
});
