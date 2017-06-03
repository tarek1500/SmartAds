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
    static $password, $security;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->e164PhoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'security' => $security ?: $security = bcrypt('secret'),
        'gender' => $faker->randomElement($array = array ('male','female')),
        'address' => $faker->address,
        'role' => $faker->randomElement($array = array ('user','admin')),
        'balance' => $faker->randomFloat(3, 0, 99999),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Zone::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'location' => $faker->state,
    ];
});

$factory->define(App\Screen::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'ipaddress' => $faker->ipv4,
    ];
});

$factory->define(App\Notification::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(3),
        'body' => $faker->text,
        'action' => $faker->sentence(1),
    ];
});

$factory->define(App\Ad::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(3),
        'url' => $faker->url,
        'duration' => $faker->randomNumber(4),
        'status' => $faker->sentence(1),
        'price' => $faker->randomFloat(3, 0, 99999),
    ];
});

$factory->define(App\Log::class, function (Faker\Generator $faker) {
    return [
        'action' => $faker->text,
    ];
});