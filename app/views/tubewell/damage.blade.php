<div class="row">
	<div class="form-group">
	    <div class="col-sm-4">{{ Form::label('Damage Date') }}</div>
	    <div class="col-sm-8">
	        {{ Form::text('well_status_date',null,array('class'=>'form-control input-sm','required')) }}
	    </div>
	</div>
	<div class="form-group">
	    <div class="col-sm-4">{{ Form::label('Nature of Damage') }}</div>
	    <div class="col-sm-8">
	        {{ Form::text('well_status_nature_damege',null,array('class'=>'form-control input-sm','required')) }}
	    </div>
	</div>
	<div class="form-group">
	    <div class="col-sm-4">{{ Form::label('Action Taken') }}</div>
	    <div class="col-sm-8">
        	{{ Form::select('well_status_action',array('','Repaired','Replaced','No Action'),null,array('class'=>'form-control input-sm','required')) }}
	    </div>
	</div>
	<div class="form-group">
	    <div class="col-sm-4">{{ Form::label('Repaired Date') }}</div>
	    <div class="col-sm-8">
	        {{ Form::text('well_status_repaired_date',null,array('class'=>'form-control input-sm','required')) }}
	    </div>
	</div>
	<div class="form-group">
	    <div class="col-sm-4">{{ Form::label('Repaired By') }}</div>
	    <div class="col-sm-8">
	        {{ Form::text('well_status_repaired_by',null,array('class'=>'form-control input-sm','required')) }}
	    </div>
	</div>
</div>
<div class="row">
	<div class="form-group">
	    <div class="col-sm-4">{{ Form::label('Note') }}</div>
	    <div class="col-sm-8">
	        {{ Form::textarea('well_status_note',null,array('class'=>'form-control input-sm')) }}
	    </div>
	</div>
</div>