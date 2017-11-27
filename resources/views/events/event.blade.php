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
    <div class="col-8">
        <div class="row">
            <form class="form-horizontal">
                <input type="hidden" name="id" value="{{$event->id}}">
                <div class="form-group">
                    <label class="col-sm-1 control-label">Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" value="{{$event->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">Location</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="location" value="{{$event->location}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">Description</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="{{$event->description}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">Time</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="datetime" value="{{$event->datetime}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">Cost</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="cost" value="{{$event->cost}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">Registration</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="cost" value="{{$event->registration}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">Capacity</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="cost" value="{{$event->capacity}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <h2>Rides</h2>
        <table class="table table-striped table-bordered" id="rides">
        <thead>
        <tr>
            <td>Name</td>
            <td>Updated</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($event->rides as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->updated_at }}</td>
                <td>
                    <a class="btn btn-small btn-primary" href="{{ URL::to('rides/' . $value->id) }}">More</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $('#rides').DataTable();
    </script>
@stop