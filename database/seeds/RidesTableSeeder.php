<?php

use Illuminate\Database\Seeder;
use App\Models\Ride;
use App\Models\User;

class RidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ride = new Ride();
        $ride->name = 'Route1';
        $ride->event_id = 1;
        $ride->capacity = 4;
        $ride->driver()->associate(User::Find(4));
        $ride->save();
        $ride->riders()->attach(2,['location'=>'PD1']);
        $ride->riders()->attach(3,['location'=>'PD2']);

        $ride = new Ride();
        $ride->name = 'Route2';
        $ride->event_id = 2;
        $ride->capacity = 4;
        $ride->driver()->associate(User::Find(1));
        $ride->save();
        $ride->riders()->attach(2,['location'=>'PD1']);
        $ride->riders()->attach(3,['location'=>'PD2']);

    }
}
