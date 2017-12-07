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
                    <td>Location</td>
                    <td>Time</td>
                    <td>Updated</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $key => $value)
                    <tr>
                        <td><a href="{{ URL::to('events/event/' . $value->id) }}">{{ $value->name }}</a></td>
                        <td>{{ $value->location }}</td>
                        <td>{{ $value->datetime }}</td>
                        <td>{{ $value->updated_at }}</td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            {{--<a class="btn btn-small btn-primary pull-left" href="{{ URL::to('events/' . $value->id) }}"><i class="fa fa-info" aria-hidden="true"></i> </a>--}}
                            {{--<a class="btn btn-small btn-warning pull-left" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>--}}
                            {{ Form::open(array('url' => 'events/rsvp' . $value->id, 'class'=>'pull-left')) }}
                            {{--<button type="submit" class="btn btn-small btn-info">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>--}}
                            <button type="submit" class="btn btn-small btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> RSVP
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
        $('#events').DataTable();
    </script>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
@stop