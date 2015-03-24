@extends('layout')

@section('container')
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE SUB DIVISION</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">Sub Division</th>
    <th width="144" height="38" align="left">Division / Circle</th>
    <th width="144" height="38" align="left">CE Zone</th>
    <th width="121" align="left" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($officeSubDivisionAll as $officeSubDivision)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left" bgcolor="">{{ $officeSubDivision->name }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $officeSubDivision->officeDivision->name }} / {{ $officeSubDivision->officeCircle->name }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $officeSubDivision->officeZone->name }}&nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('officesubdivision.destroy', array($officeSubDivision->id)),'method'=>'delete'))}}
			<a href="{{route('officesubdivision.edit', array($officeSubDivision->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit prod"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo ('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Catalog" value="{{$officeSubDivision->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $officeSubDivisionAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>ADD SUB DIVISION</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>route('officesubdivision.store'),'method'=>'post','class'=>'form-horizontal')) }}
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Sub Division') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('name','',array('class'=>'form-control input-sm','required')) }}
                    @if($errors->has('name'))
                    <p class="help-block"><span class="text-danger">{{$errors->first('name')}}</span></p>
                    @endif
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Zone / Circle') }}</div>
                <div class="col-sm-8">
                    <select name="office_circle_id" class="form-control input-sm" required onChange="return divByCircle(this.value);">
                        <option></option>
                        @foreach($officeZoneAll as $id => $officeZone)
                            <optgroup label="{{ $officeZone }}">
                            <?php
                                $officeCircle = OfficeCircle::where('office_zone_id','=',$id)->orderBy('name','asc')->lists('name','id'); 
                                foreach ($officeCircle as $id => $name) {
                                    echo "<option value='$id'>$name</option>";
                                }
                            ?>
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Division') }}</div>
                <div class="col-sm-8">
                    <select name="office_division_id" class="form-control input-sm" required id="office_division_id">
                        <option></option>
                        <?php
                            $officeDivision = OfficeDivision::orderBy('name','asc')->lists('name','id'); 
                            foreach ($officeDivision as $id => $name) {
                                //echo "<option value='$id'>$name</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4"></div>
                <div class="col-sm-8">
            	   {{ Form::submit('Save',array('class'=>'btn btn-success btn-sm')) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
@stop
<script>
    function divByCircle(division){
        $.ajax({
            url: "{{ URL::route('officesubdivision.division')}}",
            data: {'id': division},
            type: 'GET', 
        }).success(function(data){
            $('#office_division_id').html(data);
        })

    }
</script>