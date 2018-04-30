<?php

use Faker\Generator as Faker;

$factory->define(App\Competition::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'slug' => $faker->word,
    ];
});
