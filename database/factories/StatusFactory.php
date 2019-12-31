<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Status::class, function (Faker $faker)
{
    $user_ids = ['1', '2', '3'];

    $data = $faker->date().' '.$faker->time();
    return [
        'user_id' => $faker->randomElement($user_ids),
        'content' => $faker->text(),
        'created_at' => $data,
        'updated_at' => $data
    ];
});
