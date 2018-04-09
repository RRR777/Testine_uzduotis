<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'email' => 'admin@mail',
            'name' => "admin",
            'password' => bcrypt('123456')
        ]);

        \App\User::create([
            'email' => 'rita@mail',
            'name' => "Rita",
            'password' => bcrypt('123456')
        ]);

        \App\User::create([
            'email' => 'jonas@mail',
            'name' => "Jonas",
            'password' => bcrypt('123456')
        ]);

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

        \App\Trip::create([
            'user_id' => 2,
            'auto_id' => 2,
            'date' => Carbon::create(2018, 01, 01),
            'route' => 'Kauno grūdai',
            'timeStart' => "10:00",
            'timeToCustomer' => "10:55",
            'timeFromCustomer' => "11:20",
            'timeEnd' => "12:20",
            'spidometerStart' => 200200,
            'spidometerEnd' => 200250,
            'timeunload' => 10,
            'distance' => 50,
            'fuel' => 67,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        \App\Trip::create([
            'user_id' => 3,
            'auto_id' => 3,
            'date' => Carbon::create(2018, 01, 05),
            'route' => 'Kauno grūdai',
            'timeStart' => "8:45",
            'timeToCustomer' => "9:40",
            'timeFromCustomer' => "10:20",
            'timeEnd' => "11:20",
            'spidometerStart' => 200250,
            'spidometerEnd' => 200300,
            'timeunload' => 15,
            'distance' => 50,
            'fuel' => 82,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        \App\Trip::create([
            'user_id' => 2,
            'auto_id' => 3,
            'date' => Carbon::create(2018, 01, 10),
            'route' => 'Arvi Kalakutai',
            'timeStart' => "9:00",
            'timeToCustomer' => "10:30",
            'timeFromCustomer' => "11:25",
            'timeEnd' => "13:00",
            'spidometerStart' => 200315,
            'spidometerEnd' => 200395,
            'timeunload' => 20,
            'distance' => 80,
            'fuel' => 75,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
