@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>LIST waterQuality</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" class='text-center'>Sl/No</th>
    <th width="147" align="left">Tubewell ID</th>
    <th width="144" align="left">Test By</th>
    <th width="144" align="left">Date of Testing</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($waterQualityAll as $waterQuality)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left"><a href="{{ URL::route('report.waterquality',$waterQuality->id) }}">{{ $waterQuality->tubewell_id }}</a>&nbsp;</td>
    <td height="25" align="left">{{ $waterQuality->tested_by }}&nbsp;</td>
    <td height="25" align="left">{{ $waterQuality->test_date }}&nbsp;</td>
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