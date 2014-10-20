@extends('layout')

@section('container')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>ADD TUBEWELL</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>route('tubewell.store'),'method'=>'post','class'=>'form-inline')) }}

        <table class="table table-hover">
            <thead>
              
            </thead>
            <tbody>
                <tr>
                    <td>{{ Form::label('Tubewell ID') }}</td>
                    <td>{{ Form::text('tubewell_code','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Delivery Mode') }}</td>
                    <td>{{ Form::select('delivery_id',array('')+$deliveryAll,'',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('District') }}</td>
                    <td>{{ Form::select('district_id',array('')+$districtAll,'',array('class'=>'form-control input-sm','required','style'=>'width:100%','onChange'=>"return blockByDist(this.value)")) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Block') }}</td>
                    <td>{{ Form::select('block_id',array(''),'',array('class'=>'form-control input-sm','required','style'=>'width:100%','id'=>'block_id','onChange'=>"return panchayatByBlock(this.value)")) }}</td>
                    <td>{{ Form::label('Gram Panchayat / Village / Habitation') }}</td>
                    <td>{{ Form::select('panchayat_id',array(''),'',array('class'=>'form-control input-sm','required','style'=>'width:100%','id'=>'panchayat_id')) }}</td>
                    <td>{{ Form::label('Location') }}</td>
                    <td>{{ Form::text('location','',array('class'=>'form-control input-sm','style'=>'width:100%')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Sub Location') }}</td>
                    <td>{{ Form::text('sub_location','',array('class'=>'form-control input-sm','style'=>'width:100%')) }}</td>
                    <td>{{ Form::label('Landmark') }}</td>
                    <td>{{ Form::text('landmark','',array('class'=>'form-control input-sm','style'=>'width:100%')) }}</td>
                    <td>{{ Form::label('Latitude') }}</td>
                    <td>{{ Form::text('latitude','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Longitude') }}</td>
                    <td>{{ Form::text('longitude','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Elevation') }}</td>
                    <td>{{ Form::text('elevation','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('CE') }}</td>
                    <td>{{ Form::select('office_zone_id',array('')+$officeZoneAll,'',array('class'=>'form-control input-sm','style'=>'width:100%','required','onChange'=>"return circleByZone(this.value)")) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Circle') }}</td>
                    <td>{{ Form::select('office_circle_id',array(''),'',array('class'=>'form-control input-sm','style'=>'width:100%','required','id'=>'office_circle_id','onChange'=>"return divByCircle(this.value)")) }}</td>
                    <td>{{ Form::label('Division') }}</td>
                    <td>{{ Form::select('office_division_id',array(''),'',array('class'=>'form-control input-sm','style'=>'width:100%','required','id'=>'office_division_id','onChange'=>"return subdivByDiv(this.value)")) }}</td>
                    <td>{{ Form::label('Sub Division') }}</td>
                    <td>{{ Form::select('office_sub_division_id',array(''),'',array('class'=>'form-control input-sm','style'=>'width:100%','required','id'=>'office_sub_division_id','onChange'=>"return secBySubdiv(this.value)")) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Section') }}</td>
                    <td>{{ Form::select('office_section_id',array(''),'',array('class'=>'form-control input-sm','style'=>'width:100%','required','id'=>'office_section_id')) }}</td>
                    <td>{{ Form::label('Depth of SWL (Metre)') }}</td>
                    <td>{{ Form::text('depth_swl','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Depth of Boring (Metre)') }}</td>
                    <td>{{ Form::text('depth_boring','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Size of Boring (Metre)') }}</td>
                    <td>{{ Form::text('size_boring','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Drilling Date') }}</td>
                    <td>{{ Form::text('drilling_date','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Commission Date') }}</td>
                    <td>{{ Form::text('commission_date','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Discharge (lt/hr)') }}</td>
                    <td>{{ Form::text('discharge','',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Is Platform Provided') }}</td>
                    <td>{{ Form::select('platform',array(''=>'','Yes'=>'Yes','No'=>'No'),'',array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Tubewell Status') }}</td>
                    <td>{{ Form::select('well_status',array(''=>'','In Use'=>'In Use','Damage'=>'Damage','Defunct'=>'Defunct'),'',array('class'=>'form-control input-sm','style'=>'width:100%','required','onChange'=>"return status(this.value)")) }}</td>
                </tr>
            </tbody>
        </table>
        <div id="status"></div>

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

<script>
    function blockByDist(block){
        $.ajax({
            url: "{{ URL::route('tubewell.block')}}",
            data: {'id': block},
            type: 'GET', 
        }).success(function(data){
            $('#block_id').html(data);
        })

    }

    function panchayatByBlock(panchayat){
        $.ajax({
            url: "{{ URL::route('tubewell.panchayat')}}",
            data: {'id': panchayat},
            type: 'GET', 
        }).success(function(data){
            $('#panchayat_id').html(data);
        })
    }

    function circleByZone(circle){
        $.ajax({
            url: "{{ URL::route('tubewell.circle')}}",
            data: {'id': circle},
            type: 'GET', 
        }).success(function(data){
            $('#office_circle_id').html(data);
        })
    }

    function divByCircle(division){
        $.ajax({
            url: "{{ URL::route('tubewell.division')}}",
            data: {'id': division},
            type: 'GET', 
        }).success(function(data){
            $('#office_division_id').html(data);
        })
    }

    function subdivByDiv(subdivision){
        $.ajax({
            url: "{{ URL::route('tubewell.subdivision')}}",
            data: {'id': subdivision},
            type: 'GET', 
        }).success(function(data){
            $('#office_sub_division_id').html(data);
        })
    }

    function secBySubdiv(section){
        $.ajax({
            url: "{{ URL::route('tubewell.section')}}",
            data: {'id': section},
            type: 'GET', 
        }).success(function(data){
            $('#office_section_id').html(data);
        })
    }

    function status(status){
        $.ajax({
            url: "{{ URL::route('tubewell.status')}}",
            data: {'id': status},
            type: 'GET', 
        }).success(function(data){
            $('#status').html(data);
        })
    }
</script>
@stop