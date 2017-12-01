@extends('layouts.dashboard')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li><a href="{{ URL::to('/events') }}">Events</a></li>
        <li><a href="{{ URL::to('/events/'.$ride->event->id) }}">Event</a></li>
        <li class="active">Ride</li>
    </ul>
@stop
@section('page_heading')
    {{$ride->name}}
@stop
@section('section')
    <div class="container-fluid">
        <div class="row">
            {{ Form::open(array('url' => 'rides/' . $ride->id, 'class'=>'form-horizontal')) }}
            {{--<input type="hidden" name="id" value="{{$ride->id}}">--}}
            <input type='hidden' name='_method' value='PUT'/>
            <div class="form-group">
                <label class="col-sm-1 control-label">Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" value="{{$ride->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Driver</label>
                <div class="col-sm-5">
                    @if (!is_null($ride->driver))
                        {{--<input type="text" class="form-control" name="name" value="{{$ride->driver->name}}">--}}
                        <select class="form-control" name="driver_id">
                            @if (!is_null($ride->driver))
                                <option disabled selected value>Select</option>
                            @endif
                            @foreach($users as $key => $value)
                                <option value="{{$value->id}}" {{ $value->id == $ride->driver->id ? 'selected="selected"' : '' }}>{{$value->name}}</option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" class="form-control" name="name" value="">
                    @endif

                </div>
            </div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-info pull-right">Update</button>
            </div>
            </form>
        </div>
        <div class="row">
            <h2>Riders</h2>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> New Rider
                </button>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(array('url' => '/rides/'.$ride->id.'/add')) }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add New Rider</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <select class="form-control" name="user_id">
                                    @foreach($users as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
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
                            <a class="btn btn-small btn-warning pull-left" href="#"><i class="fa fa-pencil"
                                                                                       aria-hidden="true"></i></a>
                            {{ Form::open(array('url' => '/rides/'.$ride->id.'/remove/'. $value->id, 'class'=>'pull-left')) }}
                            {{--                        {{ Form::hidden('_method', 'PUT') }}--}}
                            <button type="submit" class="btn btn-small btn-danger">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $('#users').DataTable();
    </script>
@stop