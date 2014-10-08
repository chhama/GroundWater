@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE ITEMS</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">Tubewell ID</th>
    <th width="144" height="38" align="left">Delivery Mode</th>
    <th width="144" height="38" align="left">Address</th>
    <th width="144" height="38" align="left">Location</th>
    <th width="121" height="38" align="left">Office</th>
    <th width="121" height="38" align="left">Status</th>
    <th width="121" height="38" align="left">Commission Date</th>
    <th width="121" height="38" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 1; ?>
  	@foreach($tubewellAll as $tubewell)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno}}</td>
    <td height="25" align="left">{{ $tubewell->tubewell_code }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->delivery_id }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->district_id }}, {{ $tubewell->block_id }}, {{ $tubewell->panchayat_id }}, {{ $tubewell->location }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->latitude }}, {{ $tubewell->longitude }}, {{ $tubewell->allevation }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->office_zone_id }}, {{ $tubewell->office_circle_id }}, {{ $tubewell->office_division_id }}, {{ $tubewell->office_sub_division_id }}, {{ $tubewell->office_section_id }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->well_status }} &nbsp;</td>
    <td height="25" align="left">{{ $tubewell->commission_date }} &nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('tubewell.destroy', array($tubewell->id)),'method'=>'delete'))}}
			<a href="{{route('tubewell.edit', array($tubewell->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit prod"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Tubewell" value="{{$tubewell->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $tubewellAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
@stop