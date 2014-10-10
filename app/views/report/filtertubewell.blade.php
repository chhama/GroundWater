@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>REPORTS</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table class="table table-hover">
<thead>
  <tr>
    <th>Sl/No</th>
    <th>Name</th>
    <th>Value</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 1; ?>
    @foreach($reports as $report)
  	<tr bgcolor="">
    	<td>{{$slno}}</td>
    	<td>{{ $report->delivery_id }}&nbsp;</td>
    	<td>{{ $report->countRow }}&nbsp;</td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
</tfoot>
</table>
 </div>
</div>
</div>
@stop