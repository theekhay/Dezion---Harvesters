<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Church::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'active' => $faker->numberBetween($min = 0, $max = 1),
        'created_by' => 1,
        'logo' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
