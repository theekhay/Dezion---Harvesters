<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Branch::class, function (Faker $faker) {
    return [
        //'church_id' => 2,
        'name' => $faker->name,
        'active' => $faker->numberBetween($min = 0, $max = 1),
        'created_by' => 1,
        'location' => $faker->address,
    ];
});
