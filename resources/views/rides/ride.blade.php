@extends('layouts.dashboard')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{!! url('/');!!}">Home</a></li>
        <li><a href="{!! url('/events');!!}">Events</a></li>
        <li><a href="{!! url('/events/'.$ride->event->id);!!}" >Event</a></li>
        <li class="active">Ride</li>
    </ul>
@stop
@section('page_heading')
    {{$ride->name}}
@stop
@section('section')
    <div class="row">
        <form class="form-horizontal">
            <input type="hidden" name="id" value="{{$ride->id}}">
            <div class="form-group">
                <label class="col-sm-1 control-label">Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" value="{{$ride->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Driver</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" value="{{$ride->driver->name}}">
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <h2>Riders</h2>
        <table class="table table-striped table-bordered" id="users">
            <thead>
            <tr>
                <td>Name</td>
                <td>Location</td>
                <td>Time</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($ride->riders as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->pivot->location }}</td>
                    <td>{{ $value->pivot->datetime }}</td>
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
        $('#users').DataTable();
    </script>
@stop