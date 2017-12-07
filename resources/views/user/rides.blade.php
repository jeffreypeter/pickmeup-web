@extends(Auth::user()->hasRole('moderator') ? 'layouts.dashboard' : 'layouts.dashboard-user')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li class="active">Rides</li>
    </ul>
@stop
@section('page_heading')
    Rides
@stop
@section('section')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered" id="rides">
                    <thead>
                    <tr>
                        <td>Event</td>
                        <td>Driver</td>
                        <td>Location</td>
                        <td>Time</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rides as $key => $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->driver }}</td>
                            <td>{{ $value->location }}</td>
                            <td>{{ $value->datetime }}</td>
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