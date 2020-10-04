<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(6),
        'price' => $faker->numberBetween(50,300),
        'brand_id' => $faker->numberBetween(1,10),
        'category_id' => $faker->numberBetween(1,10),
        'SKE' => $faker->lexify('???'),
        'image' => $faker->imageUrl($width = 640, $height = 480,'technics'),
    ];
});
