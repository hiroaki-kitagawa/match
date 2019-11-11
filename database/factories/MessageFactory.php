<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'sender_id' => $faker->numberBetween(1,23),
        'job_id' => $faker->numberBetween(1,2),
        'receiver_id' => $faker->numberBetween(1,3),
        'text' => $faker->text(100),
        'type' => $faker->randomElement(['PM', 'DM'])
    ];
});
