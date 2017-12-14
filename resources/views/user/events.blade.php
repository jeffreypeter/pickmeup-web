@extends(Auth::user()->hasRole('moderator') ? 'layouts.dashboard' : 'layouts.dashboard-user')
@section('page_heading')
    User Profile
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li class="active">Profile</li>
    </ul>
@stop
@section('section')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered" id="events" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Location</td>
                    <td>Time</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $key => $value)
                    <tr>
                        <td><a href="{{ URL::to('events/event/' . $value->id) }}">{{ $value->name }}</a></td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->location }}</td>
                        <td>{{ $value->datetime }}</td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            @if( is_null($value->rsvp) )
                                {{ Form::open(array('url' => 'events/rsvp/' . $value->id, 'class'=>'pull-left')) }}
                                    <button type="submit" class="btn btn-small btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i> RSVP
                                    </button>
                                {{ Form::close() }}
                            @else
                                {{ Form::open(array('url' => 'events/rsvp/' . $value->id.'/remove', 'class'=>'pull-left')) }}
                                <button type="submit" class="btn btn-small btn-warning">
                                    <i class="fa fa-minus" aria-hidden="true"></i> RSVP
                                </button>
                                {{ Form::close() }}
                            @endif
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
        $('#events').DataTable();
    </script>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@stop