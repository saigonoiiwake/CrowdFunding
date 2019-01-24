<?php

use Faker\Generator as Faker;

$factory->define(App\ProjectPackage::class, function (Faker $faker) {
    return [
        'project_id'        => 1,
        'thumbnail_url'     => 'http://lorempixel.com/640/480/',
        'title'             => $faker->text(10),
        'content'           => $faker->text(100),
        'price'             => $faker->numberBetween(300,10000),    
        'quantity'          => $faker->numberBetween(1,100),
        'sponsor_count'     => $faker->numberBetween(1,100), 
        'require_info'      => $faker->text(100),
        'end_date'          => now(),
        'created_at'        => now(),
        'updated_at'        => now()
    ];
});
