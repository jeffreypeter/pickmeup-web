@extends('layouts.dashboard')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li><a href="{{ URL::to('events') }}">Events</a></li>
        <li class="active">Event</li>
    </ul>
@stop
@section('page_heading')
    {{$event->name}}
@stop
@section('section')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    {{--<form class="form-horizontal" method="put" action="event/.{{$event->id}}">--}}
{{--                    {{ Form::model($event, array('route' => 'ride.update', $event->id)) }}--}}
                    {{ Form::open(array('url' => 'events/' . $event->id, 'class'=>'form-horizontal')) }}
                        {{--<input type="hidden" name="id" value="{{$event->id}}">--}}
                        <input type='hidden' name='_method' value='PUT' />
                        <div class="form-group">
                            {{--<label class="col-sm-2 control-label">Name</label>--}}
                            {{Form::label('name', 'Name', array('class' => 'col-sm-2 control-label'))}}
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" value="{{$event->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Location</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="location" value="{{$event->location}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="description" value="{{$event->description}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Time</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="datetime" value="{{$event->datetime}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Cost</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="cost" value="{{$event->cost}}">
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <label class="col-sm-2 control-label">Registration</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="cost" value="{{$event->registration}}">
                            </div>
                        </div>--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Capacity</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="capacity" value="{{$event->capacity}}">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="row">
            <h2>Rides</h2>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> New Ride
                </button>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(array('url' => 'rides')) }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Create New Ride</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'Name','required')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('capacity', 'Capacity') }}
                                {{ Form::number('capacity', Input::old('capacity'), array('class' => 'form-control','placeholder'=>'Capacity')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('driver_id', 'Driver') }}
                                <select class="form-control" name="driver_id">
                                    @foreach($users as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                {{--{{ Form::number('driver_id', Input::old('driver_id'), array('class' => 'form-control','placeholder'=>'Capacity')) }}--}}
                            </div>
                            <div class="form-group">
                                {{ Form::hidden('event_id',$event->id, []) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('start_time', 'Start time') }}
                                {{ Form::input('datetime-local','start_time',null, ['class' => 'form-control','placeholder'=>'Start Time']) }}
                                {{--('', 'published_at', $article->published_at->format('Y-m-d\TH:i'), ['class' => 'form-control'])--}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered" id="rides" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Driver</td>
                        <td>Start time</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($event->rides as $key => $value)
                        <tr>
                            <td><a
                                   href="{{ URL::to('rides/' . $value->id) }}">{{ $value->name }}</a></td>
                            <td>
                                @if (!is_null($value->driver))
                                   {{$value->driver->name}}
                                @endif
                            </td>
                            <td>{{ $value->start_time }}</td>
                            <td>
                                <a class="btn btn-small btn-primary pull-left"
                                   href="{{ URL::to('rides/' . $value->id) }}"><i class="fa fa-info"
                                                                                  aria-hidden="true"></i> </a>
                                <a{{-- class="btn btn-small btn-warning pull-left" href="#"><i class="fa fa-pencil"
                                                                                           aria-hidden="true"></i></a>--}}
                                {{ Form::open(array('url' => 'rides/' . $value->id, 'class'=>'pull-left')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                <button type="submit" class="btn btn-small btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $('#rides').DataTable();
    </script>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@stop