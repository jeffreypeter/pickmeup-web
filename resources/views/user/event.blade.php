@extends('layouts.dashboard-user')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li><a href="{{ URL::to('events/upcoming') }}">Events</a></li>
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
                    <form class="form-horizontal" >
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
                            <div class='input-group date' id='dtp-event'>
                                <input type='text' class="form-control" name="datetime" placeholder="Time" value="{{$event->datetime}}"/>
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Cost</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="cost" value="{{$event->cost}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Capacity</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="capacity" value="{{$event->capacity}}">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $('#rides').DataTable();
        $(function () {
            $('#dtp-new-route').datetimepicker({
                format:'YYYY-MM-DD HH:mm'
            });
            $('#dtp-event').datetimepicker({
                format:'YYYY-MM-DD HH:mm'
            });
        });
    </script>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@stop