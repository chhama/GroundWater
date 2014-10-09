@extends('layout')

@section('container')
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE DISTRICT</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">District</th>
    <th width="144" height="38" align="left">Code</th>
    <th width="121" align="left" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($districtAll as $district)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left">{{ $district->name }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $district->code }}&nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('district.destroy', array($district->id)),'method'=>'delete'))}}
			<a href="{{route('district.edit', array($district->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit prod"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Catalog" value="{{$district->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $districtAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>ADD DISTRICT</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>route('district.store'),'method'=>'post','class'=>'form-horizontal')) }}
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('District') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('name','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Code') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('code','',array('class'=>'form-control input-sm','required')) }}
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