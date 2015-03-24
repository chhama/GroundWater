@extends('layout')

@section('container')
<div class="col-md-2"></div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>EXPORT DATABASE</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>route('backups.store'),'method'=>'post','class'=>'form-horizontal')) }}
            <div class="form-group">
                <div class="col-sm-8">
            	   {{ Form::submit('Export Database',array('class'=>'btn btn-danger btn-sm')) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>IMPORT DATABASE</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>route('backups.update','1'),'method'=>'put','class'=>'form-horizontal')) }}
            <div class="form-group">
            	<div class="col-sm-4"><strong>{{ Form::label('Select DB') }}</strong></div>
                <div class="col-sm-12">
					<select name="dzImportBox" class="form-control" required>
						<?php
							$dir = 'backup/';
							$open = opendir($dir);
							echo "<option value=''></option>";
							while($file = readdir($open)) {
								if($file=='.' || $file=='..'){
									continue;
								}
								echo "<option value='$file'>$file </option>";
							}
							//closedir($dir);
						?>
					</select>
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-8">
            	   {{ Form::submit('Import Database',array('class'=>'btn btn-success btn-sm')) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
<div class="col-md-2"></div>
@stop