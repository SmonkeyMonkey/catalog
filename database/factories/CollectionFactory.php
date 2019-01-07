<?php

use Faker\Generator as Faker;

$factory->define(App\Collection::class, function (Faker $faker) {
    return [
        'title'          => $faker->sentence($nb=2),
        'description'    => $faker->sentence($nb=15),
        'brand_id'       => rand(1, 10),
    ];
});
