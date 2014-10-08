@extends('layout')

@section('container')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>ADD TUBEWELL</strong></div>
		<div class="panel-body">
        {{ Form::model($tubewellById,array('url'=>route('tubewell.update',$tubewellById->id),'method'=>'put','class'=>'form-inline')) }}
            <div class="row">
                <div class="form-group">
                	<div class="col-sm-4">{{ Form::label('Tubewell ID') }}</div>
                    <div class="col-sm-8">
                        {{ Form::text('tubewell_code',null,array('class'=>'form-control input-sm','required')) }}
                    </div>
                </div>
                <div class="form-group">
                	<div class="col-sm-5">{{ Form::label('Delivery Mode') }}</div>
                    <div class="col-sm-7">
                        {{ Form::select('delivery_id',array('')+$deliveryAll,null,array('class'=>'form-control input-sm','required')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">{{ Form::label('District') }}</div>
                    <div class="col-sm-8">
                        {{ Form::select('district_id',array('')+$districtAll,null,array('class'=>'form-control input-sm','required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-4">{{ Form::label('Block') }}</div>
                    <div class="col-sm-8">
                        {{ Form::select('block_id',array('')+$blockAll,null,array('class'=>'form-control input-sm','required')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-7">{{ Form::label('Gram Panchayat / Village / Habitation') }}</div>
                    <div class="col-sm-5">
                        {{ Form::select('panchayat_id',array('')+$panchayatAll,null,array('class'=>'form-control input-sm','required')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">{{ Form::label('Location') }}</div>
                    <div class="col-sm-8">
                        {{ Form::text('location',null,array('class'=>'form-control input-sm')) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Sub Location') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('sub_location',null,array('class'=>'form-control input-sm')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Landmark') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('landmark',null,array('class'=>'form-control input-sm')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Latitude') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('latitude',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Longitude') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('longitude',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Allevation') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('allevation',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('CE') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_zone_id',array('')+$officeZoneAll,null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Circle') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_circle_id',array('')+$officeCircleAll,null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Division') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_division_id',array('')+$officeDivisionAll,null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Sub Division') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_sub_division_id',array('')+$officeSubDivisionAll,null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Section') }}</div>
                <div class="col-sm-8">
                    {{ Form::select('office_section_id',array('')+$officeSectionAll,null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Depth of SWL (Metre)') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('depth_swl',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Depth of Boring (Metre)') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('depth_boring',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Size of Boring (Metre)') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('size_boring',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Drilling Date') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('drilling_date',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Commission Date') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('commission_date',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Discharge (lt/hr)') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('discharge',null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-7">{{ Form::label('Is Platform Provided') }}</div>
                <div class="col-sm-5">
                    {{ Form::select('platform',array(''=>'','Yes'=>'Yes','No'=>'No'),null,array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">{{ Form::label('Tubewell Status') }}</div>
                <div class="col-sm-6">
                    {{ Form::select('well_status',array(''=>'','In Use'=>'In Use','Damage'=>'Damage','Defunction'=>'Defunction'),null,array('class'=>'form-control input-sm','required')) }}
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