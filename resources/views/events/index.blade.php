@extends('layouts.dashboard')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li class="active" >Events</li>
    </ul>
@stop
@section('page_heading','Events')
@section('section')
    <div class="container-fluid">
        <div class="row">
            <!-- Button trigger modal -->
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> New Event
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(array('url' => 'events')) }}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Create New Event</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'Name','required')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('location', 'Location') }}
                                    {{ Form::text('location', Input::old('location'), array('class' => 'form-control','placeholder'=>'Location','required')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description', 'Description') }}
                                    {{ Form::text('description', Input::old('description'), array('class' => 'form-control','placeholder'=>'Description','required')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('url', 'URL') }}
                                    {{ Form::text('url', Input::old('url'), array('class' => 'form-control','placeholder'=>'URL')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('capacity', 'Capacity') }}
                                    {{ Form::number('capacity', Input::old('capacity'), array('class' => 'form-control','placeholder'=>'Capacity')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('cost', 'Cost') }}
                                    {{ Form::number('cost', Input::old('cost'), array('class' => 'form-control','placeholder'=>'Cost')) }}
                                </div>
                                {{--<div class="form-group">
                                    {{ Form::label('datetime', 'Datetime') }}
                                    {{ Form::input('datetime-local','datetime',null, ['class' => 'form-control','placeholder'=>'Date Time']) }}
                                    --}}{{--('', 'published_at', $article->published_at->format('Y-m-d\TH:i'), ['class' => 'form-control'])--}}{{--
                                </div>--}}
                                <div class="form-group">
                                    <label class="control-label">Datetime</label>

                                        <div class='input-group date' id='dtp-event'>
                                            <input type='text' class="form-control" name="datetime" placeholder="Time"/>
                                            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                        </div>
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
                <table class="table table-striped table-bordered" id="events" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Location</td>
                        <td>Time</td>
                        <td>Updated</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $key => $value)
                        <tr>
                            <td><a href="{{ URL::to('events/' . $value->id) }}">{{ $value->name }}</a></td>
                            <td>{{ $value->location }}</td>
                            <td>{{ $value->datetime }}</td>
                            <td>{{ $value->updated_at }}</td>
                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <a class="btn btn-small btn-primary pull-left" href="{{ URL::to('events/' . $value->id) }}"><i class="fa fa-info" aria-hidden="true"></i> </a>
                                {{--<a class="btn btn-small btn-warning pull-left" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>--}}
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
            </div>
        </div>
    </div>

@stop
@section('js')
    <script src="{{ asset('assets/components/events.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#dtp-event').datetimepicker({
                format:'YYYY-MM-DD HH:mm'
            });
        });
    </script>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
@stop