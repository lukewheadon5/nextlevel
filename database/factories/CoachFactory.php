<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coach;
use Faker\Generator as Faker;

$factory->define(Coach::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first()->id,
        'team_id' => App\Team::inRandomOrder()->first()->id,
        
    ];
});
