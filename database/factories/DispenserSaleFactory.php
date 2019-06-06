<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DispenserSale;
use Faker\Generator as Faker;

$factory->define(DispenserSale::class, function (Faker $faker) {
    return [
        'sale_volume' => $faker->numberBetween(200, 400),
        'dispenser_id' => $faker->numberBetween(1, 21)
    ];
});
