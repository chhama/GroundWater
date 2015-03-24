@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE Water Quality</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">Tubewell ID</th>
    <th width="121" height="38" align="left">Tested By</th>
    <th width="121" height="38" align="left">Commissioning Date</th>
    <th width="121" height="38" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($waterQualityAll as $waterQuality)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left">{{ $waterQuality->tubewell_id }}&nbsp;</td>
    <td height="25" align="left">{{ $waterQuality->tested_by }}&nbsp;</td>
    <td height="25" align="left">{{ $waterQuality->test_date }} &nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('waterquality.destroy', array($waterQuality->id)),'method'=>'delete'))}}
			<a href="{{route('waterquality.edit', array($waterQuality->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit prod"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo ('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove waterQuality" value="{{$waterQuality->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="9">{{ $waterQualityAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
@stop