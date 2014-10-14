@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
    <h5><strong>REPORTS</strong></h5>
    {{Form::open(array('url'=>route('report.tubewellstatus'), 'method'=>'get', 'id'=>'search_report','class'=>'form-inline'))}}
      <div class="form-group">
        <div class="col-sm-4">{{ Form::label('From') }}</div>
        <div class="col-sm-8">
          {{ Form::text('date1',null,array('class'=>'form-control input-sm'),'required') }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4">{{ Form::label('To') }}</div>
        <div class="col-sm-8">
          {{ Form::text('date2',null,array('class'=>'form-control input-sm','required')) }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4"></div>
          <div class="col-sm-8">
           {{ Form::submit('Search',array('class'=>'btn btn-success btn-sm')) }}
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
    	<td>{{ $report->countRow }}&nbsp;</td>
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