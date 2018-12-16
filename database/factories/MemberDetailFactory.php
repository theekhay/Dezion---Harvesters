<?php

use Faker\Generator as Faker;

$factory->define(App\Models\MemberDetail::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName(),
        'surname' => $faker->lastName,
        'middlename' => (random_int(0,1) == 1 ) ? $faker->name : NULL,
        'branch_id' => $faker->numberBetween($min = 1, $max = 10),
        'email' => $faker->safeEmail,
        'telephone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'created_by' => 1,
        'member_type_id' => random_int(1,3),
    ];
});
