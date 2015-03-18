@extends('layout')

@section('container')
<div class="col-md-12">
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
  </tr>
  </thead>
  <tbody>
    <?php $slno = 0; ?>
    @foreach($lithologyByTubewell as $lithology)
    <tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left">
      <?php
        $code = Tubewell::find($lithology->tubewell_id);
        echo $code->tubewell_code;
      ?>
    <td height="25" align="left" bgcolor="">{{ $lithology->depth_from }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $lithology->depth_to }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $lithology->soil_class }}&nbsp;</td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
  <td colspan="6">{{ $lithologyByTubewell->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
@stop