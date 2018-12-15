<?php

use Faker\Generator as Faker;

$factory->define(App\Models\BranchMemberType::class, function (Faker $faker) {

    $approved = random_int(0, 1);

    return [
        'name' => $faker->word,
        'branch_id' => $faker->numberBetween(1, 10),
        'approved_by' => ( $approved == 0 ) ? null : 1,
        'approved_date' => ( $approved == 0 ) ? null : $faker->dateTimeThisMonth(),
        'status' => ( $approved == 0 ) ? 0 : 1,
        'created_by' => 1
    ];
});
