<?php

/** @var Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => random_int(2,9),
        'title' => $faker->text(10),
        'image_name' => Str::random(10) . '.jpg',
        'description' => $faker->text,
        'rating' => $faker->randomFloat(1, 1, 5),
    ];
});
