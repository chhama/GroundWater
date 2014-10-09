@extends('layout')

@section('container')
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE PANCHAYAT</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">Code</th>
    <th width="147" height="38" align="left">Panchayat</th>
    <th width="144" height="38" align="left">Block</th>
    <th width="144" height="38" align="left">District</th>
    <th width="121" align="left" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 0; ?>
  	@foreach($panchayatAll as $panchayat)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno+$index}}</td>
    <td height="25" align="left">{{ $panchayat->code }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $panchayat->name }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $panchayat->block->name }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $panchayat->district->name }}&nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('panchayat.destroy', array($panchayat->id)),'method'=>'delete'))}}
			<a href="{{route('panchayat.edit', array($panchayat->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit prod"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Catalog" value="{{$panchayat->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $panchayatAll->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>EDIT PANCHAYAT</strong></div>
		<div class="panel-body">
        {{ Form::model($panchayatById, array('url'=>route('panchayat.update',$panchayatById->id),'method'=>'put','class'=>'form-horizontal')) }}
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Panchayat') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('name',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Code') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('code',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('District / Block') }}</div>
                <div class="col-sm-8">
                    <select name="block_id" class="form-control input-sm" required>
                        <option></option>
                        @foreach($districtAll as $id => $district)
                            <optgroup label="{{ $district }}">
                            <?php
                                $blockByDist = Block::where('district_id','=',$id)->orderBy('name','asc')->lists('name','id'); 
                                foreach ($blockByDist as $id => $name) {
                                    if($id == $panchayatById->block_id){
                                        $selected = "selected";
                                    } else { $selected=''; }
                                    echo "<option value='$id' $selected >$name</option>";
                                }
                            ?>
                            </optgroup>
                        @endforeach
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