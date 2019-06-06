<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Dispenser;
use Faker\Generator as Faker;

$factory->define(Dispenser::class, function (Faker $faker) {
    return [
        'serial_num' => $faker->unique()->text(15),
        'num_of_nozzles' => $faker->numberBetween(1,9),
        'fuel_type' => $faker->randomElement(['Petroleum', 'Alcohols', 'Compressed Natural Gas', 'Specialized'])
    ];
});
