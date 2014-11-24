@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
    <h5><strong>REPORTS</strong></h5>
    {{Form::open(array('url'=>route('report.filtertubewell'), 'method'=>'get', 'id'=>'search_report'))}}
      <div class="form-group col-md-3">
        <div class="row">
          {{Form::select('report', $filter, Input::get('report'), array('class' => 'dropdown input-sm', 'id' => 'nos_tubewell','onChange'=>"return filterTubewell(this.value)"))}}
        </div>
      </div>
      <div class="form-group col-md-2">
        <div class="row">
          <label>Depth From</label>
          {{Form::text('from',Input::get('from'), array('class' => 'input-sm', 'id' => 'from','size'=>'10'))}}
        </div>
      </div>
      <div class="form-group col-md-2">
        <div class="row">
          <label>Depth To</label>
          {{Form::text('to',Input::get('to'), array('class' => 'input-sm', 'id' => 'to','size'=>'10'))}}
        </div>
      </div>
    {{Form::close()}}
</div>
<div class="panel-body" style="padding:0px;">
<table class="table table-hover">
<thead>
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>No. of Tubewell</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 1; $total = 0;?>
    @foreach($reports as $report)
  	<tr bgcolor="">
    	<td>{{$slno}}</td>
    	<td><?php if(isset($report->name)){ echo $report->name; } else { echo 'No. of Tubewell'; } ?>&nbsp;</td>
    	<td><a href="{{ URL::route('report.listtubewell',array('report'=>Input::get('report'),'from'=>Input::get('from'),'to'=>Input::get('to'),'name'=>$report->deliveryId))}}">{{ $report->countRow }}</a>&nbsp;</td>
    </tr>
    <?php
      $total = $total + ($report->countRow); 
      $slno++; 
    ?>
    @endforeach
</tbody>
<tfoot>
  <tr>
    <td>&nbsp;</th>
    <td align="right"><strong>Total</strong></th>
    <td><strong><?=$total?></strong></th>
  </tr>
</tfoot>
</table>
 </div>
</div>
</div>
@stop
<script type="text/javascript">
  function filterTubewell(value){
    $('#search_report').submit();
  }
  /*$(function(){
    $('#nos_tubewell').on('change', function(){
      alert('Hello');
        //$('#search_report').submit();
    });
  });*/
</script>