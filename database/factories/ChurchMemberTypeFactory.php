<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ChurchMemberType::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'church_id' => $faker->numberBetween(1, 6),
        'created_by' => 1
    ];
});
