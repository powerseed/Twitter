<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Status::class, function (Faker $faker)
{
    $user_ids = \App\User::all()->pluck('id')->toArray();

    $data = $faker->date().' '.$faker->time();
    return [
        'user_id' => $faker->randomElement($user_ids),
        'content' => $faker->text(),
        'created_at' => $data,
        'updated_at' => $data
    ];
});
