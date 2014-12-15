@extends('layout')
@section('container')
<div class="col-md-4">&nbsp;</div>
<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Add User
			</div>
			<div class="panel-body">
				{{ Form::model($userById,array('url'=>route('user.update',$userById->id),'method'=>'put','class'=>'form-vertical')) }}
				<div class="form-group">
					{{Form::label('Name')}}
					{{Form::text('name',null,['class'=>'form-control','placeholder'=>'Name'])}}
				</div>
				<div class="form-group">
					{{Form::label('Username')}}
					{{Form::text('username',null,['class'=>'form-control','placeholder'=>'Username'])}}
				</div>
				<div class="form-group">
					{{Form::label('Password')}}
					{{Form::password('password',['class'=>'form-control'])}}
				</div>
				<div class="form-group">
					{{Form::label('User Type')}}
					{{Form::select('usertype',['administrator'=>'Administrator','user'=>'User'],null,['class'=>'form-control'])}}
				</div>
				<div class="form-group">
					{{Form::submit('Update User',['class'=>'btn btn-default'])}}
				</div>
				{{Form::close()}}			
			</div>
		</div>
</div>
<div class="col-md-4">&nbsp;</div>
@stop