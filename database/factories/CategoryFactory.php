<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nb = 2),
        'description' => $faker->realText($maxNbChars = 100),
        'created_by' => 1,
        'updated_by' => 1
    ];
});
