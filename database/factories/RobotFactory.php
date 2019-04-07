<?php

use Faker\Generator as Faker;

$factory->define(App\Robot::class, function (Faker $faker) {
    return [
        'name' => $faker->text(5),
        'speed' => $faker->randomDigit,
        'power' =>$faker->randomDigit,
        'weight'=> $faker->randomDigit,
        'created_by'=> $faker->randomDigit,
        'updated_by'=> $faker->randomDigit
    ];
});
