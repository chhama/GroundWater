<div class="row">
	<div class="form-group">
	    <div class="col-sm-4">{{ Form::label('Defunction Date') }}</div>
	    <div class="col-sm-8">
	        {{ Form::text('well_status_date',null,array('class'=>'form-control input-sm','required')) }}
	    </div>
	</div>
</div>
<div class="row">
	<div class="form-group">
	    <div class="col-sm-4">{{ Form::label('Reason') }}</div>
	    <div class="col-sm-8">
	        {{ Form::textarea('well_status_note',null,array('class'=>'form-control input-sm')) }}
	    </div>
	</div>
</div>