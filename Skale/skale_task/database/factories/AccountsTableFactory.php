<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\AccountModel::class, function (Faker $faker) {
    return [
        // 'account_id' => $faker->randomNumber(),
        // 'user_id' => $faker->randomNumber(),
        'account_id' => $faker->numberBetween(1, 256),
        'user_id' => $faker->numberBetween(1, 256),
        'email' => $faker->email,
        'is_active' => $faker->numberBetween(0, 1),
        'created_at' => now()
    ];
});

// $faker->email
