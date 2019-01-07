<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title'          => $faker->sentence($nb=2),
        'brand_id'       => rand(1,15),
        'collection_id'  => rand(1,15),
        'specifications' => $faker->realText($maxNbChars =50),
        'price'          => $faker->numberBetween($min=5,$max=10000),
//        'image'          => $faker->imageUrl($width=600, $height=400, 'animals', true, 'Faker', true),
    ];
});
