@extends('layouts.dashboard-user')
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
        <div class="col-lg-6">
            {{ Form::open(array('url' => 'profile/' . Auth::user()->id, 'class'=>'form-horizontal')) }}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Auth::user()->name, array('class' => 'form-control','placeholder'=>'Name','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Auth::user()->phone, array('class' => 'form-control','placeholder'=>'Phone','required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('address', 'Address') }}
                {{ Form::text('address', Auth::user()->address, array('class' => 'form-control','placeholder'=>'Address')) }}
            </div>
            <div class="form-group">
                {{ Form::label('organization', 'Organization') }}
                {{ Form::text('organization', Auth::user()->organization, array('class' => 'form-control','placeholder'=>'Organization')) }}
            </div>
            <button type="submit" class="btn btn-info pull-right">Update</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
@section('css')
    <style>
        body {
            background-color: white;
        }
    </style>
@stop