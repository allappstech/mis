@extends('layouts.app')

@section('content')
 
 
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <style type="text/css">
   
   </style>
<div class="container-fluid">
    <div class="row">
	
        <div class="col-md-3 col-md-offset-0">
 <nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Student Information  </a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="actived"><a href="/student">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li ><a href="#">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li ><a href="#">Exam Card<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Results <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
					<ul class="dropdown-menu forAnimate" role="menu">
					 @foreach($menus as $menu)
						 <li><a href="/student/results/{{$menu->grade_id}}">{{ $menu->Semester }} {{ $menu->Sessions }}</a></li>
		  				 @endforeach
						
					</ul>
				</li>
				 
								<li class="activez"><a href="#"> Educational status<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li class="activez"><a href="#">Deferming<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
	   <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
			</ul>
		</div>
	</div>
</nav>

  
            @foreach($semes as $seme)
 		  				 @endforeach
        </div>
		 <div class="col-md-8">
		 
		 <h2>Semester Result</h2>
		<h4> {{ $seme->Semester }} {{ $seme->Sessions }}</h4>
		
		  <table width="100%">
		    <tr>
			<td><label>Course</label></td>
			<td><label>Units</label></td>
			<td><label>Grade</label></td>
			<td><label>Point</label></td>
			<td><label>GP</label></td>
			<td><label>Remark </label></td> 
			</tr>
  @foreach($results as $result)
		
			 <tr>
			<td><label>{{ $result->course_id }} </label></td>
			<td><label> {{ $result->Units }}</label></td>
			<td><label> {{ $result->Grade }}</label></td>
			<td><label> {{ $result->Point }}</label></td>
			<td><label> {{ $result->Grade_Point }}</label></td>
			<td><label> {{ $result->Remark }} </label></td> 
			</tr>
			  @endforeach
			   
			 
			  
		  </table>
<br>
<br>
		  <table width="80%">
		  	<tr>
		  		<td> PU </td>
		  		<td> CSU   </td>
		  		<td> CU   </td>
		  		<td>  GP TS  </td>
		  		<td >GP LS  </td>
		  		<td>   CGP  </td>
		  		<td> GPA TS  </td>
		  		<td> CGPA  </td>
		  		<td>  Remark  </td>

		  	</tr>

		  		<tr>
		  		<td>{{ $seme->Prev_Units }}</td>
		  		<td>{{ $seme->Curr_Sem_Units  }}</td>
		  		<td>{{ $seme->Cumm_Units  }}</td>
		  		<td> {{ $seme->GP_This_Sem }}</td>
		  		<td>{{ $seme->GP_Last_Sem }}</td>
		  		<td>  {{ $seme->CGP }}</td>
		  		<td>{{ $seme->GPA_This_Sem }}</td>
		  		<td>{{ $seme->CGPA  }}</td>
		  		<td>{{ $seme->GeneralRemark }}</td>

		  	</tr>
		  </table>
		 
		<div>Keys</div>
		 <table>
		 <tr>
		 <td>PU</td>
		 <td>Previous Units</td>
		 </tr> 
		 <tr>
		 <td>CSU</td>
		 <td>Current  Semester Units</td>
		 </tr> 
		 <tr>
		 <td>CU</td>
		 <td>Cumulative Unit</td>
		 </tr>
		 <tr>
		 <td>GP TS</td>
		 <td>Grade Point This Semester</td>
		 </tr>
		 <tr>
		 <td>CGPA</td>
		 <td>Cumulative Grade Point Average </td>
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