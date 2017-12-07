@extends('layouts.dashboard')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li class="active" >Users</li>
    </ul>
@stop
@section('page_heading','Users')
@section('section')
    <div class="container-fluid">
        <div class="row">
            <!-- Button trigger modal -->
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary open-modal-button" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> New User
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(array('url' => 'users')) }}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Create New User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'Name','required')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::text('email', Input::old('email'), array('class' => 'form-control','placeholder'=>'Email','required')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('phone', 'Phone') }}
                                    {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control','placeholder'=>'Phone','required')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('organization', 'Organization') }}
                                    {{ Form::text('organization', Input::old('organization'), array('class' => 'form-control','placeholder'=>'Organization')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('address', 'Address') }}
                                    {{ Form::text('address', Input::old('address'), array('class' => 'form-control','placeholder'=>'Address')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password', 'Password') }}
                                    {{ Form::text('password', Input::old('password'), array('class' => 'form-control','placeholder'=>'Password')) }}
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
                <table class="table table-striped table-bordered" id="users" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Organization</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $value)
                        <tr>
                            <td><a href="{{ URL::to('users/' . $value->id) }}">{{ $value->name }}</a></td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->organization }}</td>
                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <a class="btn btn-small btn-primary pull-left" href="{{ URL::to('users/' . $value->id) }}"><i class="fa fa-info" aria-hidden="true"></i> </a>
                                {{--<a class="btn btn-small btn-warning pull-left" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>--}}
                                {{ Form::open(array('url' => 'users/' . $value->id, 'class'=>'pull-left')) }}
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
    <script src="{{ asset('assets/components/users.js') }}" type="text/javascript"></script>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
@stop