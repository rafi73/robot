<?php

use Faker\Generator as Faker;

$factory->define(App\Robot::class, function (Faker $faker) use ($factory) {
    //$userId = $factory->create(App\User::class)->id;
    return [
        'name' => $faker->text(5),
        'speed' => $faker->randomDigit,
        'power' =>$faker->randomDigit,
        'weight'=> $faker->randomDigit,
        'weight'=> $faker->randomDigit
    ];
});
