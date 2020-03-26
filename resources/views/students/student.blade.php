@extends('layouts.app')

@section('content')
<style>
  table, tr, td{
	  
  }
</style>
   
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container-fluid">
    <div class="row">
	
        <div class="col-md-8 col-md-offset-0">
 


@include('includes.sidenavbar')
 

  
           
        </div>
		 <div class="col-md-3">
		 <div class="dp"> 
		 <img src="{{ URL::asset('storage/app/public/images/WB88c0nSkyqylvRVcEPWGMpHsuN1ARJRd16G2Spb.png') }}" />
    		  </div>
		  <form name="f2" action="upload" method="post" enctype="multipart/form-data">
		  <input type="file" name="picup">
		  @csrf
		  <input type="submit" name="upload_pic" value="Upload">
		  </form>
		  
		  @foreach($students as $student)
		   
		  @endforeach
		  <table>
		    <tr>
			<td><label>Name:</label></td>
			<td> {{ Auth::user()->fullname }}</td>
			</tr>
			
			  <tr>
			<td> <label>Admission Number:</label></td>
			<td>{{ Auth::user()->AdmissionNo }}</td>
			</tr>
			
			  <tr>
			<td>   <label>College:</label></td>
			<td>{{ $student->College_Code }}</td>
			</tr>
			
			  <tr>
			<td> <label>Department:</label></td>
			<td>{{ $student->Department }} </td>
			</tr> 
			
			 <tr>
			<td> <label>Programe:</label></td>
			<td>{{ $student->Program_Code }} ({{ Auth::user()->Category }})</td> 
			</tr>
			
			 <tr>
			<td> <label>Status:</label></td>
			<td></td>
			</tr>
		  </table>
		  
		  
		 </div>
		
    </div>
</div>
@endsection
<script>
$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});


    function htmlbodyHeightUpdate(){
		var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}
		
	}
	$(document).ready(function () {
		htmlbodyHeightUpdate()
		$( window ).resize(function() {
			htmlbodyHeightUpdate()
		});
		$( window ).scroll(function() {
			height2 = $('.main').height()
  			htmlbodyHeightUpdate()
		});
	});
</script>