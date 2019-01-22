<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    
    return [
        'category_id'       => 1,      
        'title'             => $faker->text(10),
        'video_url'         => 'https://www.youtube.com/embed/sC5AWm9FAIw', 
        'owners'            => 42996400,
        'description'       => $faker->text(20),
        'funding_target'    => $faker->numberBetween(1000000,10000000), 
        'start_date'        => now(), 
        'end_date'          => now(), 
        'content'           => $faker->text,
    ];
});
