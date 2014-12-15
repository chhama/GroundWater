@extends('layout')
@section('container')



<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th width="300">Name</th>
						<th width="250">Username</th>
						<th width="150">Type</th>
						<th width="100">Control</th>
					</tr>
				</thead>
				<tbody>
				<?php $slno=0;?>
				@foreach($userAll as $user)
					<tr>
						<td>{{ $slno+$index }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->usertype }}</td>
						<td>
				    	{{Form::open(array('url'=>route('user.destroy', array($user->id)),'method'=>'delete'))}}
				            <a href="{{route('user.edit', array($user->id))}}" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-primary"  style="width:20px; height:20px; padding:1px;" title="Edit User"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
				            <button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-danger" style="width:20px; height:20px; padding:1px;" title="Remove User" value="{{$user->id}}"><i class="glyphicon glyphicon-trash"></i></button>
				        {{Form::close()}}
						</td>
					</tr>
					<?php $slno++; ?>
				@endforeach
				</tbody>
				
				<tr>
					<td colspan="5">{{ $userAll->links() }}</td>
				</tr>
				
				</table>			
			</div>
		</div>
</div>	


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
		

@stop