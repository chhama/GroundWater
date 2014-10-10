@extends('layout')
@section('container')



<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Username</th>
						<th>Type</th>
					</tr>
				</thead>
				<tbody>
				@foreach($allusers as $users)
					<tr>
						<td>{{ $users->username }}</td>
						<td>{{ $users->usertype }}</td>
					</tr>
				@endforeach
				</tbody>
				</table>			
			</div>
		</div>
</div>	


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
				{{Form::select('usertype',['administrator'=>'Administrator','user'=>'User'],null,['class'=>'form-control'])}}
				{{Form::submit('Create User',['class'=>'btn btn-default'])}}
				{{Form::close()}}			
			</div>
		</div>
</div>
		

{{$allusers->links();}}	

@stop