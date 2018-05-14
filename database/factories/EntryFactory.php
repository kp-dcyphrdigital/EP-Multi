<?php

use Faker\Generator as Faker;

$factory->define(App\Entry::class, function (Faker $faker) {
    return [
    	'competition_id' => App\Competition::inRandomOrder()->first()->id,
		'firstname' => $faker->firstname(),
		'lastname' => $faker->lastname,
		'email' => $faker->email,
		'telephone' => '04' . $faker->randomNumber(8, true),
		'url' => $faker->image(base_path() . '/storage/app/public/images', 640, 480, '', false),
		// 'url' => 'abc.jpg',
        'approved' => rand(0, 1),
        'created_at' => $faker->dateTimeBetween('-2 days', 'now', 'Australia/Sydney'),
    ];
});

