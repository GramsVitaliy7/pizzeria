<?php

/** @var Factory $factory */

use App\Models\ProductDoping;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProductDoping::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'price' => $faker->randomFloat(2, 200, 1000),
    ];
});
