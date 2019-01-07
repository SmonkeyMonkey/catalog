<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'title'          => $faker->sentence($nb=2),
        'category_id'    => rand(1,15),
        'description'    =>$faker->text($maxNbChars = 200),
        'about'          => $faker->realText($maxNbChars =50),
        'is_published'   => '1',
    ];
});
