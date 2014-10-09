<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHE Ground Water Management System</title>

    <!-- Bootstrap CSS -->
  {{ HTML::Style('css/bootstrap.min.css') }}

  @yield('extrahead')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">PHE</a>
    </div>
  
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL::route('district.index') }}">District</a></li>
        <li><a href="{{ URL::route('block.index') }}">Block</a></li>
        <li><a href="{{ URL::route('panchayat.index') }}">Panchayat</a></li>
        <li><a href="{{ URL::route('lithology.index') }}">Lithology</a></li>

      </ul>
      
      <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tubewells <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="{{ URL::route('tubewell.index') }}">List</a></li>
          <li><a href="{{ URL::route('tubewell.create') }}">Create</a></li>
        </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Office <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('officezone.index')}}">Zone</a></li>
            <li><a href="{{ URL::route('officecircle.index')}}">Circle</a></li>
            <li><a href="{{ URL::route('officedivision.index')}}">Division</a></li>
            <li><a href="{{ URL::route('officesubdivision.index')}}">Sub-Division</a></li>
            <li><a href="{{ URL::route('officesection.index')}}">Section</a></li>
          </ul>
        </li>

       
        <li><a href="{{ URL::route('user.index') }}">Users</a></li>
         
        <li><a href="{{ URL::route('waterquality.index') }}">Water Quality</a></li>


    </ul>

    <?php  if(Auth::check()) {?>
      <ul class='navbar navbar-right navbar-nav' style='list-style-type:none;'>
        <li>        
          <a href='user.editprofile'>
            <span class='glyphicon glyphicon-user' style='margin-top:15px; color:#668855;width:100px;'> Profile</span>        
        </a>
        </li>
        <li> 
          <a href='logout'>
            <span class='glyphicon glyphicon-off' style='margin-top:15px; color:red;width:90px;' > Logout</span>
          </a>
        </li>
        
      </ul>
  <?php } else { ?>
  {{Form::open(['route'=>'sessions.store','class'=>'navbar-form navbar-right'])}}
      {{"<div class='form-group'>"}}
        {{Form::text('username','',['class'=>'form-control'])}}
        {{Form::password('password',['class'=>'form-control'])}}
      {{"</div>"}}
        {{Form::submit('Login',['class'=>'btn btn-default'])}}
        {{Form::close()}}
  <?php } ?>
    </div><!-- /.navbar-collapse -->
  
  </nav>

  @if(Session::has('flash_message'))
    <div class="container" style="margin-top:5px">
          <p class="alert alert-{{Session::get('msgtype')}}"><strong>{{ Session::get('flash_message') }}</strong></p>
    </div>
  @endif

 
<!-- <div class="jumbotron">
    <h1 class="text-center">Hello World</h1>
</div> -->
 @yield('container')

    <!-- jQuery -->
    {{ HTML::Script('js/jquery.js') }}
    <!-- Bootstrap JavaScript -->
    {{ HTML::Script('js/bootstrap.js') }}
  </body>
</html>