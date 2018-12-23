<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Collection::class, function (Faker $faker) {
    return [
        'title'          => $faker->sentence($nb=2),
        'description'    => $faker->sentence($nb=15),
        'brand_id'       => $faker->randomDigit(),
    ];
});
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title'          => $faker->sentence($nb=2),
        'brand_id'       => $faker->randomDigit(),
        'collection_id'  => $faker->randomDigit(),
        'specifications' => $faker->realText($maxNbChars =50),
        'price'          =>$faker->numberBetween($min = 1, $max = 4),
        'image'          =>$faker->imageUrl($width=600, $height=400, 'animals', true, 'Faker', true),
        'is_published'   =>1
    ];
});
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title'          => $faker->sentence($nb=2),
        'description'    => $faker->realText($maxNbChars = 100),
        'image'          =>$faker->imageUrl($width=600, $height=400, 'cats', true, 'Faker', true),
    ];
});
$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'title'          => $faker->sentence($nb=2),
        'category_id'    => $faker->randomDigit(),
        'description'    =>$faker->text($maxNbChars = 200),
        'about'          => $faker->realText($maxNbChars =50),
        'image'          =>$faker->imageUrl($width=600, $height=400, 'animals', true, 'Faker', true),
        'is_published'   =>1
    ];
});
