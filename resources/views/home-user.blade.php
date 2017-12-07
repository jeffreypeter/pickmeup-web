@extends('layouts.dashboard-user')
{{--@section('page_heading','Hi '.Auth::user()->name.',')--}}
@section('page_heading','Dashboard')
@section('section')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-star fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$dashboard['events']}}</div>
                                <div>Upcoming Events!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url ('events/upcoming') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-car fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$dashboard['events']}}</div>
                                <div>Rides Provided!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url ('events/rides') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
            
            
            
            {{--<div class="row">
               
                <div class="col-10">
				
				Rides Assigned:
                <table class="table table-striped table-bordered" id="events" >
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Location</td>
                        <td>Time</td>
                       
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $key => $value)
                        <tr>
                            <td><a href="{{ URL::to('events/' . $value->id) }}">{{ $value->name }}</a></td>
                            <td>{{ $value->location }}</td>
                            <td>{{ $value->datetime }}</td>
                            
                            <!-- we will also add show, edit, and delete buttons -->
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

                </div>--}}
@stop
