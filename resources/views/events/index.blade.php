@extends('layouts.dashboard')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li class="active" >Events</li>
    </ul>
@stop
@section('page_heading','Events')
@section('section')
    <table class="table table-striped table-bordered" id="events">
        <thead>
        <tr>
            <td>Name</td>
            <td>Location</td>
            <td>Description</td>
            <td>Time</td>
            <td>Registration</td>
            <td>Capacity</td>
            <td>Cost</td>
            <td>Updated</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->location }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->datetime }}</td>
                <td>{{ $value->registration }}</td>
                <td>{{ $value->capacity }}</td>
                <td>{{ $value->cost }}</td>
                <td>{{ $value->updated_at }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <a class="btn btn-small btn-primary pull-left" href="{{ URL::to('events/' . $value->id) }}"><i class="fa fa-info" aria-hidden="true"></i> </a>
                    <a class="btn btn-small btn-warning pull-left" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    {{ Form::open(array('url' => 'events/' . $value->id, 'class'=>'pull-left')) }}
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
@stop
@section('js')
    <script src="{{ asset('assets/components/events.js') }}" type="text/javascript"></script>
@stop