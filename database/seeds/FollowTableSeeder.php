<?php

use App\Models\Follow;
use Illuminate\Database\Seeder;

class FollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Follow::class, 20)->create();
    }
}
