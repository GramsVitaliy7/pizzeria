<?php

/** @var Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'image_name' => Str::random(10) . '.jpg',
        'description' => $faker->text,
    ];
});
