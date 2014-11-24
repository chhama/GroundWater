@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>LIST TUBEWELL</strong></h5></div>
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
    <th width="121" height="38" align="left">Commissioning Date</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($tubewellAll as $tubewell)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left">{{ $tubewell->tubewell_code }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->delivery->name }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->district->name }}, {{ $tubewell->block->name }}, {{ $tubewell->panchayat->name }}, {{ $tubewell->location }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->latitude }}, {{ $tubewell->longitude }}, {{ $tubewell->elevation }}&nbsp;</td>
    <td height="25" align="left">{{ $tubewell->officeZone->name }}, {{ $tubewell->officeCircle->name }}, {{ $tubewell->officeDivision->name }}, {{ $tubewell->officeSubDivision->name }}, {{ $tubewell->officeSection->name }}&nbsp;</td>
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