@extends('layouts.dashboard')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li><a href="{{ URL::to('/users') }}">Users</a></li>
        <li class="active">User</li>
    </ul>
@stop
@section('page_heading')
    {{$user->name}}
@stop
@section('section')
    <div class="container-fluid">
        <div class="col-lg-6">
            {{ Form::open(array('url' => 'users/' . $user->id, 'class'=>'form-horizontal')) }}
            <input type='hidden' name='_method' value='PUT'/>
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $user->name, array('class' => 'form-control','placeholder'=>'Name','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', $user->email, array('class' => 'form-control','placeholder'=>'Email','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', $user->phone, array('class' => 'form-control','placeholder'=>'Phone','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('organization', 'Organization') }}
                {{ Form::text('organization', $user->organization, array('class' => 'form-control','placeholder'=>'Organization')) }}
            </div>
            <div class="form-group">
                {{ Form::label('address', 'Address') }}
                {{ Form::text('address', $user->address, array('class' => 'form-control','placeholder'=>'Address')) }}
            </div>
            <button type="submit" class="btn btn-info pull-right">Update</button>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $('#users').DataTable();
    </script>
@stop