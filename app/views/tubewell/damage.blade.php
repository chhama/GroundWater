<table class="table table-hover">
	<thead>
	  
	</thead>
	<tbody>
	    <tr>
	        <td>{{ Form::label('Damage Date') }}</td>
	        <td>{{ Form::text('well_status_date',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
	        <td>{{ Form::label('Nature of Damage') }}</td>
	        <td>{{ Form::text('well_status_nature_damege',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
	        <td>{{ Form::label('Note') }}</td>
	        <td rowspan="3">{{ Form::textarea('well_status_note',null,array('class'=>'form-control input-sm','style'=>'width:100%','rows'=>'4')) }}</td>
	    </tr>
	    <tr>
	        <td>{{ Form::label('Repaired Date') }}</td>
	        <td>{{ Form::text('well_status_repaired_date',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
	        <td>{{ Form::label('Repaired By') }}</td>
	        <td>{{ Form::text('well_status_repaired_by',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
	        <td>&nbsp;</td>
	    </tr>
	    <tr>
	        <td>{{ Form::label('Action Taken') }}</td>
	        <td>{{ Form::select('well_status_action',array('','Repaired','Replaced','No Action'),null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	    </tr>
	</tbody>
</table>