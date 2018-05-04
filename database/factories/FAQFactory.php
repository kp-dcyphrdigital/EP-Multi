<?php

use Faker\Generator as Faker;

$factory->define(App\FAQ::class, function (Faker $faker) {
    return [
        'competition_id' => App\Competition::inRandomOrder()->first()->id,
		'question' => $faker->sentence,
       	'answer' => $faker->paragraph,
    ];
});
