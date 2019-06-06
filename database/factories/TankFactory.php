<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tank;
use Faker\Generator as Faker;

$factory->define(Tank::class, function (Faker $faker) {
    $capacity = $faker->numberBetween(2000, 5000);
    return [
        'serial_num' => $faker->unique()->text(15),
        'capacity' => $capacity,
        'stock_left' => $capacity,
        'fuel_type' => $faker->randomElement(['Petroleum', 'Alcohols', 'Compressed Natural Gas', 'Specialized'])
    ];
});
