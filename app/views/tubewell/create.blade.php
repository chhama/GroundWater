@extends('layout')

@section('container')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>ADD TUBEWELL</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>route('tubewell.store'),'method'=>'post','class'=>'form-inline')) }}
            <div class="row">
                <div class="form-group">
                	<div class="col-sm-4">{{ Form::label('Tubewell ID') }}</div>
                    <div class="col-sm-8">
                        {{ Form::text('tubewell_code','',array('class'=>'form-control input-sm','required')) }}
                    </div>
                </div>
                <div class="form-group">
                	<div class="col-sm-5">{{ Form::label('Delivery Mode') }}</div>
                    <div class="col-sm-7">
                        {{ Form::select('delivery_id',array('')+$deliveryAll,'',array('class'=>'form-control input-sm','required')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">{{ Form::label('District') }}</div>
                    <div class="col-sm-8">
                        {{ Form::select('district_id',array('')+$districtAll,'',array('class'=>'form-control input-sm','required','onChange'=>"return blockByDist(this.value)")) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-4">{{ Form::label('Block') }}</div>
                    <div class="col-sm-8">
                        {{ Form::select('block_id',array(''),'',array('class'=>'form-control input-sm','required','id'=>'block_id','onChange'=>"return panchayatByBlock(this.value)")) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-7">{{ Form::label('Gram Panchayat / Village / Habitation') }}</div>
                    <div class="col-sm-5">
                        {{ Form::select('panchayat_id',array(''),'',array('class'=>'form-control input-sm','required','id'=>'panchayat_id')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">{{ Form::label('Location') }}</div>
                    <div class="col-sm-8">
                        {{ Form::text('location','',array('class'=>'form-control input-sm')) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Sub Location') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('sub_location','',array('class'=>'form-control input-sm')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Landmark') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('landmark','',array('class'=>'form-control input-sm')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Latitude') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('latitude','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Longitude') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('longitude','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Elevation') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('elevation','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('CE') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_zone_id',array('')+$officeZoneAll,'',array('class'=>'form-control input-sm','required','onChange'=>"return circleByZone(this.value)")) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Circle') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_circle_id',array(''),'',array('class'=>'form-control input-sm','required','id'=>'office_circle_id','onChange'=>"return divByCircle(this.value)")) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Division') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_division_id',array(''),'',array('class'=>'form-control input-sm','required','id'=>'office_division_id','onChange'=>"return subdivByDiv(this.value)")) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Sub Division') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_sub_division_id',array(''),'',array('class'=>'form-control input-sm','required','id'=>'office_sub_division_id','onChange'=>"return secBySubdiv(this.value)")) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Section') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_section_id',array(''),'',array('class'=>'form-control input-sm','required','id'=>'office_section_id')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Depth of SWL (Metre)') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('depth_swl','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Depth of Boring (Metre)') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('depth_boring','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Size of Boring (Metre)') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('size_boring','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Drilling Date') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('drilling_date','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Commission Date') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('commission_date','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Discharge (lt/hr)') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('discharge','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-7">{{ Form::label('Is Platform Provided') }}</div>
                <div class="col-sm-5">
                    {{ Form::select('platform',array(''=>'','Yes'=>'Yes','No'=>'No'),'',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5">{{ Form::label('Tubewell Status') }}</div>
                <div class="col-sm-7">
                    {{ Form::select('well_status',array(''=>'','In Use'=>'In Use','Damage'=>'Damage','Defunction'=>'Defunction'),'',array('class'=>'form-control input-sm','required','onChange'=>"return status(this.value)")) }}
                </div>
            </div>
            <div id="status">&nbsp;</div>
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