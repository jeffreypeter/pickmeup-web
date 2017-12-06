@extends('layouts.dashboard-user')
@section('page_heading','Dashboard')
@section('section')
            
            
            
            
            <div class="row">
               
                <div class="col-10">
				
				Rides Assigned:
                <table class="table table-striped table-bordered" id="events" >
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Location</td>
                        <td>Time</td>
                       
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $key => $value)
                        <tr>
                            <td><a href="{{ URL::to('events/' . $value->id) }}">{{ $value->name }}</a></td>
                            <td>{{ $value->location }}</td>
                            <td>{{ $value->datetime }}</td>
                            
                            <!-- we will also add show, edit, and delete buttons -->
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                   
                        
                       
                    
                
                </div>

              

@stop
