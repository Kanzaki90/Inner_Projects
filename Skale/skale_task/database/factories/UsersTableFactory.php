<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\UsersModel::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1, 256),
        // 'id' => $faker->numberBetween(1, 256),
        // 'user_id' => $faker->randomNumber(),
        // 'user_id' => $faker->numberBetween(1, 10),
        'user_name' => $faker->name,
        'created_at' => now()
    ];
});
