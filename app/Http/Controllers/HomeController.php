<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Event;
use App\Models\User;
use App\Models\Ride;
use View;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::count();
        if (Auth::user()->hasRole('moderator')) {
            Log::info('moderator');

            $dashboard = array(
                'events' => $events
            );
            return view('home-admin')
                ->with('dashboard', $dashboard);
        } else {
            Log::info('guest');
            $dashboard = array(
                'events' => $events
            );
            Log::info($dashboard);
//            $rides = Ride:
            /*$events = Event::whereIn('id', function ($query) {
                $query->select('event_id')
                    ->from(with(new Ride)->getTable())
                    ->where('driver_id', Auth::user()->id);
            })->get();*/
            return View::make('home-user')
                ->with('dashboard', $dashboard);

        }
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function updateProfile($id, Request $request)
    {
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        Auth::user()->fresh();
        Session::flash('message', 'Successfully updated User Profile!');
        Session::flash('status', 'success');
        return view('user.profile');
    }
}
