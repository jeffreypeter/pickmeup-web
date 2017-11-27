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
        $new_event = new Event();
        $new_event->name = 'Christmas Celebration';
        $new_event->location = 'EEC';
        $new_event->description = 'Learn about christmas';
        $new_event->cost = 0;
        $new_event->registration = 10;
        $new_event->capacity = 100;
        $new_event->dateTime = Carbon::now()->format('Y-m-d H:i:s');
        $new_event->save();
        $new_event = new Event();
        $new_event->name = 'Fall Break';
        $new_event->location = 'Brown County';
        $new_event->description = 'Brown County Camping';
        $new_event->cost = 0;
        $new_event->registration = 15;
        $new_event->capacity = 200;
        $new_event->dateTime = Carbon::now()->format('Y-m-d H:i:s');
        $new_event->save();
    }
}
