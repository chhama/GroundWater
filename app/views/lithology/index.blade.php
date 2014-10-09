@extends('layout')

@section('container')
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE LITHOLOGY</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">Tubewell ID</th>
    <th width="144" height="38" align="left">Depth From</th>
    <th width="144" height="38" align="left">Depth To</th>
    <th width="144" height="38" align="left">Soil Class</th>
    <th width="121" align="left" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($lithologyAll as $lithology)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left">{{ $lithology->tubewell_id }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $lithology->depth_from }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $lithology->depth_to }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $lithology->soil_class }}&nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('lithology.destroy', array($lithology->id)),'method'=>'delete'))}}
			<a href="{{route('lithology.edit', array($lithology->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit prod"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Catalog" value="{{$lithology->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $lithologyAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>ADD LITHOLOGY</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>route('lithology.store'),'method'=>'post','class'=>'form-horizontal')) }}
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Tubewell ID') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('tubewell_id',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Depth From') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('depth_from',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Depth To') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('depth_to',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Soil Class') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('soil_class',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4"></div>
                <div class="col-sm-8">
            	   {{ Form::submit('Save',array('class'=>'btn btn-success btn-sm')) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
@stop