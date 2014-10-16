<table class="table table-hover">
	<thead>
	  
	</thead>
	<tbody>
	    <tr>
	        <td>{{ Form::label('Defunct Date') }}</td>
	        <td>{{ Form::text('well_status_date',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
	        <td>{{ Form::label('Reason') }}</td>
	        <td>{{ Form::textarea('well_status_note',null,array('class'=>'form-control input-sm','style'=>'width:100%','rows'=>'3')) }}</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	    </tr>
	</tbody>
</table>