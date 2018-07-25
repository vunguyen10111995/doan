<?php
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    
    return [
        'full_name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('secret'),
        'avatar' => config('setting.defaultAvatar'),
        'address' => $faker->address,
        'gender' => $faker->randomElement($array = array('male', 'female')),
        'admin_access' => 0,
        'created_at' => Carbon\Carbon::now(),
        'username' => $faker->text(6)
    ];
});

$factory->define(App\Models\Service::class, function (Faker\Generator $faker) {
    return [
        'category_id' => function () {
            return App\Models\Category::pluck('id')
                ->random(1)
                ->first();
        },
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'title' => $faker->text(30),
        'image' => config('setting.defaultAvatar'),
        'sale_from' => $faker->dateTime(),
        'sale_end' => $faker->dateTime(),
        'description' => $faker->text(30),
        'note' => $faker->text(30),
        'status' => 'approved',
        'sale_percent' => $faker->numberBetween(1, 100),
        'created_at' => Carbon\Carbon::now(),
        'url' => 'fb.com'
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'created_at' => Carbon\Carbon::now()
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'service_id' => function () {
            return App\Models\Service::pluck('id')
                ->random(1)
                ->first();
        },
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'content' => $faker->text(50),
        'created_at' => Carbon\Carbon::now()
    ];
});

$factory->define(App\Models\Follow::class, function (Faker\Generator $faker) {
    return [
        'follower_id' => $faker->numberBetween(1, 10),
        'following_id' => $faker->numberBetween(11, 20),
        'created_at' => Carbon\Carbon::now()
    ];
});

$factory->define(App\Models\Address::class, function (Faker\Generator $faker) {
    return [
        'service_id' => function () {
            return App\Models\Service::pluck('id')
                ->random(1)
                ->first();
        },
        'image' => config('setting.defaultAvatar'),
        'name_address' => $faker->text(30),
        'telephone' => $faker->text(30),
        'description' => $faker->text(50),
        'created_at' => Carbon\Carbon::now()
    ];
});

