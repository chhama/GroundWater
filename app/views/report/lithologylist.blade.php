@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE TUBEWELL</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">Tubewell ID</th>
    <th width="121" height="38" align="left">Status</th>
    <th width="121" height="38" align="left">Commissioning Date</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($tubewellAll as $tubewell)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left"><a href="{{ URL::route('report.lithology',$tubewell->id) }}">{{ $tubewell->tubewell_code }}</a>&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->well_status }} &nbsp;</td>
    <td height="25" align="left">{{ $tubewell->commission_date }} &nbsp;</td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="9">{{ $tubewellAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
@stop