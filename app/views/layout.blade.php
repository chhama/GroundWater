<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GROUND WATER MIS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{ HTML::Style('css/bootstrap.min.css') }}
{{ HTML::Script('js/jquery.js') }}
{{ HTML::Script('js/jquery.js') }}
{{ HTML::Style('css/dzStyle.css') }}
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header" style="background:maroon">
    	<a class="navbar-brand" href="{{ URL::to('/')}}">Dashboard</a>
  	</div>
    <div class="col-md-8">
    	<div class="collapse navbar-collapse">
    		<ul class="nav navbar-nav">
          <li><a href="{{ URL::route('district.index')}}">District</a></li>
          <li><a href="{{ URL::route('block.index')}}">Block</a></li>
          <li><a href="{{ URL::route('panchayat.index')}}">Panchayat</a></li>
          <li><a href="{{ URL::route('officezone.index')}}">Office Zone</a></li>
          <li><a href="{{ URL::route('officecircle.index')}}">Office Circle</a></li>
          <li><a href="{{ URL::route('officedivision.index')}}">Office Division</a></li>
          <li><a href="{{ URL::route('officesubdivision.index')}}">Office Sub-Division</a></li>
          <li><a href="{{ URL::route('officesection.index')}}">Office Section</a></li>
          <li><a href="{{ URL::route('tubewell.index')}}">Tubewell</a></li>
          <li><a href="{{ URL::route('tubewell.create')}}">Add Tubewell</a></li>
    		</ul>
    	</div>
    </div>
    <div class="col-md-2">
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
          <li><a href="{{ URL::to('/user')}}">User</a></li>
          <li><a href="{{ URL::to('/logout')}}">Logout</a></li>
        </ul>
      </div>
    </div>
</nav>
<div class="container" style="margin-top:70px">
  @if(Session::has('message'))
      <p class="alert alert-success"><strong>{{ Session::get('message') }}</strong></p>
  @endif
	@yield('container')
</div>
<footer class="dzFooter nav navbar-inverse text-center" style="height:50px; padding-top:15px; color:#FFF ">
    Osasys &copy;  <?=date('Y')?> 
</footer>
</body>
</html>