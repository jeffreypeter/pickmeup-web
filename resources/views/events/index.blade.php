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

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-primary" href="{{ URL::to('events/' . $value->id) }}">More</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    {{--<a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>--}}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('js')
    <script src="{{ asset('assets/components/events.js') }}" type="text/javascript"></script>
@stop