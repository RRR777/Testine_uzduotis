<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Auto::create([
            'name' => "Volvo",
            'number' => 'AAA111',
            'stop' => 5,
            'drive' => 32,
            'unload' => 20,
            'creator_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        \App\Auto::create([
            'name' => "Citroen",
            'number' => 'DDD222',
            'stop' => 6,
            'drive' => 30,
            'unload' => 18,
            'creator_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        \App\Auto::create([
            'name' => "Man",
            'number' => 'KKK444',
            'stop' => 4,
            'drive' => 28,
            'unload' => 19,
            'creator_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
