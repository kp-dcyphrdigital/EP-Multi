<?php

use Faker\Generator as Faker;

$factory->define(App\Competition::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'slug' => $faker->word,
        'banner' => $faker->imageUrl($width = 1920, $height = 1080),
		'cta' => $faker->sentence,
        'description' => $faker->paragraph,
       	'faqs' => $faker->paragraphs(10, true),
       	'terms' => $faker->paragraphs(10, true),
    ];
});
