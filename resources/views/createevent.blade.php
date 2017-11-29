@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')
 
 
 <?php  if (Auth::guest()) {
 //is a guest so redirect
 return redirect('/login');
 
}


?>
            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">
                
				
				
            </div>
            <!-- /.row -->
            <div class="row">
               
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                   <h2>Create A New Event </h2>
				   <form>
				   Event Name <input type="text" name="name" >
				   Location <input type="text" name="location" >
				   Date and Time : <input type="datetime-local">
				   Description : <input type="
                   
                      
                    
                    <!-- /.panel -->
                    
                   
                   
                </div>

                <!-- /.col-lg-4 -->
            
@stop
