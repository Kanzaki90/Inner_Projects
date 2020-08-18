<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\UsersModel::class, function (Faker $faker) {
    return [
        // 'user_id' => $faker->randomNumber(),
        'user_id' => $faker->numberBetween(1, 255),
        'user_name' => $faker->name,
        'created_at' => now()
    ];
});
