<?php

namespace App\Http\Controllers;

use View;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\Ride;
use App\Models\User;

use Illuminate\Http\Request;

class RideManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $ride = new Ride();
        $ride->fill($request->all());
        $ride->save();
        Session::flash('message', 'Successfully created ride!');
        Session::flash('status', 'success');
        return Redirect::to('rides/'.$ride->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ride = Ride::find($id);
        $users = User::all();
        return View::make('rides.ride')
            ->with('ride', $ride)
            ->with('users', $users);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function edit(Ride $ride)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ride = Ride::find($id);
        $ride->fill($request->all());
        $ride->save();
        Session::flash('message', 'Successfully updated the ride!');
        Session::flash('status', 'success');
        return Redirect::to('rides/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('In::RideManagementController@destroy::: '.$id);
        $ride = Ride::find($id);
        $eventId = $ride->event->id;
        Session::flash('message', 'Successfully removed '.$ride->name);
        Session::flash('status', 'success');
        $ride->delete();
        return Redirect::to('events/'.$eventId);
    }
    public function removeRider($id,$userId) {
        Log::info('In::RideManagementController@updateUser::: '.$id.' ;UserId:: '.$userId);
        $ride = Ride::find($id);
        $ride->riders()->detach($userId);
        Session::flash('message', 'Successfully removed the user!');
        Session::flash('status', 'success');
        return Redirect::to('rides/'.$id);
    }

    public function addRider($id, Request $request) {
        Log::info('In::RideManagementController@updateUser::: '.$id);
        $ride = Ride::find($id);
        $ride->riders()->attach($request['user_id']);
        Session::flash('message', 'Successfully added the user!');
        Session::flash('status', 'success');
        return Redirect::to('rides/'.$id);
    }
}
