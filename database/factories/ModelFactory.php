<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'description' => $faker->paragraph(2, true),
        'role' => 'member',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $user_id = $faker->randomNumber(2);
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph(2, true),
        'user_id' => $user_id,
        'type' => $faker->randomElement(['problem', 'idea', 'project'])
    ];
});


$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $user_id = $faker->randomNumber(2);
    $post_id = $faker->randomNumber(2);
    return [
        'body' => $faker->paragraph(2, true),
        'user_id' => $user_id,
        'post_id' => $post_id,
    ];
});
