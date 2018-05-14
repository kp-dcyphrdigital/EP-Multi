<?php

use Faker\Generator as Faker;

$factory->define(App\Competition::class, function (Faker $faker) {
	if ( App::environment('testing') ) {
	    return [
	        'name' => $faker->words(2, true),
	        'slug' => $faker->word,
	        'banner' => 'abc.jpg',
			'cta' => $faker->sentence,
	        'description' => $faker->paragraphs(3, true),
	       	'terms' => $faker->paragraphs(10, true),
	    ];
	} else {
	    return [
	        'name' => $faker->words(2, true),
	        'slug' => $faker->word,
	        'banner' => $faker->image(base_path() . '/storage/app/public/images', 1920, 540, '', false),
			'cta' => $faker->sentence,
	        'description' => $faker->paragraphs(3, true),
	       	'terms' => $faker->paragraphs(10, true),
	    ];		
	}
});
