<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\TransactionsModel::class, function (Faker $faker) {

    return [
        'id' => $faker->numberBetween(1, 256),

        // 'id' => $faker->unique()->randomDigit(),
        // 'transaction_id' => $faker->numberBetween(1, 256),
        'account_id' => $faker->numberBetween(1, 256),
        'type' => $faker->randomElement(['Deposit', 'Withdraw', 'Transfer']),
        'amount' => $faker->numberBetween(100, 999),
        'currency' => $faker->randomElement(['USD', 'NIS', 'EUR', 'YEN']),
        'created_at' => now()
    ];
});
