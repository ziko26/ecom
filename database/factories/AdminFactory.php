<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'zakaria bouhanda',
        'email' => 'bouhanda@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('admin'), // password
    ];
});
