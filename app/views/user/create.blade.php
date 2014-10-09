@extends('layout')
@section('container')

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Create New User
			</div>
			<div class="panel-body">
				{{Form::open(['route'=>'user.store'])}}
				{{Form::text('username','',['class'=>'form-control','placeholder'=>'username'])}}
				{{Form::password('password',['class'=>'form-control'])}}
				{{Form::password('password_confirm',['class'=>'form-control'])}}
				{{Form::submit('Create User',['class'=>'btn btn-default'])}}
				{{Form::close()}}			
			</div>
		</div>
	</div>

	<div class="col-md-6">
		
	</div>
@stop