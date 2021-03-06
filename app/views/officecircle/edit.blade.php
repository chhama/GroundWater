@extends('layout')

@section('container')
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE CIRCLE</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">Circle</th>
    <th width="144" height="38" align="left">CE Zone</th>
    <th width="121" align="left" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($officeCircleAll as $officeCircle)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left" bgcolor="">{{ $officeCircle->name }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $officeCircle->officeZone->name }}&nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('officecircle.destroy', array($officeCircle->id)),'method'=>'delete'))}}
			<a href="{{route('officecircle.edit', array($officeCircle->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit prod"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo ('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Catalog" value="{{$officeCircle->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $officeCircleAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>EDIT CIRCLE</strong></div>
		<div class="panel-body">
        {{ Form::model($officeCircleById, array('url'=>route('officecircle.update',$officeCircleById->id),'method'=>'put','class'=>'form-horizontal')) }}
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Circle') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('name',null,array('class'=>'form-control input-sm','required')) }}
                    @if($errors->has('name'))
                    <p class="help-block"><span class="text-danger">{{$errors->first('name')}}</span></p>
                    @endif
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('CE Zone') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_zone_id',$officeZoneAll,null,array('class'=>'form-control input-sm','required')) }}
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