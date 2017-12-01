<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return View::make('events.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('In::EventManagementController@store::: ');
//        Log::info($request->all());
        $event = new Event();
        $event->fill($request->all());
        $event->save();
        Log::info($event);
        // redirect
        Session::flash('message', 'Successfully created event!');
        return Redirect::to('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        Log::info('In::EventManagementController@show::: '.$id);
        $event = Event::find($id);
        $users = User::all();
        return View::make('events.event')
            ->with('event', $event)
            ->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info('In::RideManagementController@update::: '.$id);
        $event = Event::find($id);
        $event->fill($request->all());
        $event->save();
//        Log::info($event);
        Session::flash('message', 'Successfully updated Event!');
        return Redirect::to('events/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Log::info('In::RideManagementController@destroy::: '.$id);
        $event = Event::find($id);

        Session::flash('message', 'Successfully removed '.$event->name);
        $event->delete();
        return Redirect::to('events');
    }
}
