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
  	<?php $slno = 0; ?>
  	@foreach($reports as $report)
  	<tr bgcolor="">
    	<td>{{$slno+$index}}</td>
    	<td>{{ $report->name }}&nbsp;</td>
    	<td>{{ $report->value }}&nbsp;</td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $reports->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
@stop