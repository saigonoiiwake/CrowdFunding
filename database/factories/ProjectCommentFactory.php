<?php

use Faker\Generator as Faker;

$factory->define(App\ProjectComment::class, function (Faker $faker) {
    return [
        'project_id'        => 1,      
        'user_id'           => 42996400,
        'comment'           => $faker->text(20),
        'created_at'        => now(), 
        'updated_at'        => now(), 
    ];

});
