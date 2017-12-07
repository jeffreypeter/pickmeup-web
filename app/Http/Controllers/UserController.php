<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use View;

class UserController extends Controller
{
    //
    /*function rsvpEvent($eventId,$userId) {

    }*/

    function getEvents() {
        Log::info('getEvents');
        $events = Event::all();
        return View::make('user.events')
            ->with('events', $events);
    }

    function getEventDetails($id) {
        $event = Event::find($id);
        return View::make('user.event')
            ->with('event',$event);
    }

    function getRides() {
        $user = Auth::user();
        $rides = DB::table('events')
                        ->join('rides','events.id','=','rides.event_id')
                        ->join('ride_user','rides.id','=','ride_user.ride_id')
                        ->join('users','users.id','=','rides.driver_id')
                        ->select('events.name','users.name as driver','ride_user.datetime','ride_user.location')
                        ->where('ride_user.user_id','=',$user->id)->get();
//        Log::info($event);
        return View::make('user.rides')
            ->with('rides',$rides);
        /*$rideDB::table('events')
            ->join('rides')
            ->join('ride_user','events.id','=','event_user.event_id')
            ->where([['event_user.user_id','=',$user->id],['has_ride','=','1']]);*/


    }
}
