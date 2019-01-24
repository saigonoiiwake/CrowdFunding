<?php

use Faker\Generator as Faker;

$factory->define(App\ProjectCommentReply::class, function (Faker $faker) {
    return [
        'comment_id'        => $faker->randomNumber(2),      
        'user_id'           => 42996400,
        'reply'             => $faker->text(10),
        'created_at'        => now(), 
        'updated_at'        => now(), 
    ];
});
