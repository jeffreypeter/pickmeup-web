<?php

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event();
        $event->name = 'Christmas Celebration';
        $event->location = 'EEC';
        $event->description = 'Learn about christmas';
        $event->cost = 0;
        $event->registration = 10;
        $event->capacity = 100;
        $event->dateTime = Carbon::now()->format('Y-m-d H:i:s');
        $event->save();
        $event->rsvps()->attach(4);
        $event->rsvps()->attach(5);
        $event->rsvps()->attach(6);

        $event = new Event();
        $event->name = 'Fall Break';
        $event->location = 'Brown County';
        $event->description = 'Brown County Camping';
        $event->cost = 0;
        $event->registration = 15;
        $event->capacity = 200;
        $event->dateTime = Carbon::now()->format('Y-m-d H:i:s');
        $event->save();
        $event->rsvps()->attach(4);
    }
}
