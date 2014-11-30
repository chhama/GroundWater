@extends('layout')

@section('container')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>EDIT TUBEWELL</strong></div>
        <div class="panel-body">
        {{ Form::model($tubewellById, array('url'=>route('tubewell.update',$tubewellById->id),'method'=>'post','class'=>'form-inline')) }}
            <table class="table table-hover">
            <thead>
              
            </thead>
            <tbody>
                <tr>
                    <td>{{ Form::label('Tubewell ID') }}</td>
                    <td>{{ Form::text('tubewell_code',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Delivery Mode') }}</td>
                    <td>{{ Form::select('delivery_id',array('')+$deliveryAll,null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('District') }}</td>
                    <td>{{ Form::select('district_id',array('')+$districtAll,null,array('id'=>'district_id','class'=>'form-control input-sm','required','style'=>'width:100%','onChange'=>"return blockByDist(this.value)")) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Block') }}</td>
                    <td>{{ Form::select('block_id',array($tubewellById->block_id=>$tubewellById->block->name),null,array('class'=>'form-control input-sm','required','style'=>'width:100%','id'=>'block_id','onChange'=>"return panchayatByBlock(this.value)")) }}</td>
                    <td>{{ Form::label('Gram Panchayat / Village / Habitation') }}</td>
                    <td>{{ Form::select('panchayat_id',array($tubewellById->panchayat_id=>$tubewellById->panchayat->name),null,array('class'=>'form-control input-sm','required','style'=>'width:100%','id'=>'panchayat_id')) }}</td>
                    <td>{{ Form::label('Location') }}</td>
                    <td>{{ Form::text('location',null,array('class'=>'form-control input-sm','style'=>'width:100%')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Sub Location') }}</td>
                    <td>{{ Form::text('sub_location',null,array('class'=>'form-control input-sm','style'=>'width:100%')) }}</td>
                    <td>{{ Form::label('Landmark') }}</td>
                    <td>{{ Form::text('landmark',null,array('class'=>'form-control input-sm','style'=>'width:100%')) }}</td>
                    <td>{{ Form::label('Latitude') }}</td>
                    <td>{{ Form::text('latitude',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Longitude') }}</td>
                    <td>{{ Form::text('longitude',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Elevation') }}</td>
                    <td>{{ Form::text('elevation',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('CE') }}</td>
                    <td>{{ Form::select('office_zone_id',array('')+$officeZoneAll,null,array('id'=>'office_zone_id','class'=>'form-control input-sm','style'=>'width:100%','required','onChange'=>"return circleByZone(this.value)")) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Circle') }}</td>
                    <td>{{ Form::select('office_circle_id',array($tubewellById->office_circle_id=>$tubewellById->officeCircle->name),null,array('class'=>'form-control input-sm','style'=>'width:100%','required','id'=>'office_circle_id','onChange'=>"return divByCircle(this.value)")) }}</td>
                    <td>{{ Form::label('Division') }}</td>
                    <td>{{ Form::select('office_division_id',array($tubewellById->office_division_id=>$tubewellById->officeDivision->name),null,array('class'=>'form-control input-sm','style'=>'width:100%','required','id'=>'office_division_id','onChange'=>"return subdivByDiv(this.value)")) }}</td>
                    <td>{{ Form::label('Sub Division') }}</td>
                    <td>{{ Form::select('office_sub_division_id',array($tubewellById->office_sub_division_id=>$tubewellById->officeSubDivision->name),null,array('class'=>'form-control input-sm','style'=>'width:100%','required','id'=>'office_sub_division_id','onChange'=>"return secBySubdiv(this.value)")) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Section') }}</td>
                    <td>{{ Form::select('office_section_id',array($tubewellById->office_section_id=>$tubewellById->officeSection->name),null,array('class'=>'form-control input-sm','style'=>'width:100%','required','id'=>'office_section_id')) }}</td>
                    <td>{{ Form::label('Depth of SWL (Metre)') }}</td>
                    <td>{{ Form::text('depth_swl',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Depth of Boring (Metre)') }}</td>
                    <td>{{ Form::text('depth_boring',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Size of Boring (Metre)') }}</td>
                    <td>{{ Form::text('size_boring',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Drilling Date') }}</td>
                    <td>{{ Form::text('drilling_date',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Commission Date') }}</td>
                    <td>{{ Form::text('commission_date',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Discharge (lt/hr)') }}</td>
                    <td>{{ Form::text('discharge',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Running Hrs of Rig') }}</td>
                    <td>{{ Form::text('run_hr_rig',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Running Hrs of Compressor') }}</td>
                    <td>{{ Form::text('run_hr_compressor',null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('Is Platform Provided') }}</td>
                    <td>{{ Form::select('platform',array(''=>'','Yes'=>'Yes','No'=>'No'),null,array('class'=>'form-control input-sm','style'=>'width:100%','required')) }}</td>
                    <td>{{ Form::label('Tubewell Status') }}</td>
                    <td>{{ Form::select('well_status',array('In Use'=>'In Use','Damage'=>'Damage','Defunct'=>'Defunct'),null,array('id'=>'well_status','class'=>'form-control input-sm','style'=>'width:100%','required','onChange'=>"return status(this.value)")) }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <div id="defunct">
            <table class="table table-hover">
                <thead>
                  
                </thead>
                <tbody>
                    <tr>
                        <td>{{ Form::label('Defunct Date') }}</td>
                        <td>{{ Form::text('well_status_date',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
                        <td>{{ Form::label('Reason') }}</td>
                        <td>{{ Form::textarea('well_status_note',null,array('class'=>'form-control input-sm','style'=>'width:100%','rows'=>'3')) }}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="damage">
            <table class="table table-hover">
                <thead>
                  
                </thead>
                <tbody>
                    <tr>
                        <td>{{ Form::label('Damage Date') }}</td>
                        <td>{{ Form::text('well_status_date',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
                        <td>{{ Form::label('Nature of Damage') }}</td>
                        <td>{{ Form::text('well_status_nature_damege',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
                        <td>{{ Form::label('Note') }}</td>
                        <td rowspan="3">{{ Form::textarea('well_status_note',null,array('class'=>'form-control input-sm','style'=>'width:100%','rows'=>'4')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('Repaired Date') }}</td>
                        <td>{{ Form::text('well_status_repaired_date',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
                        <td>{{ Form::label('Repaired By') }}</td>
                        <td>{{ Form::text('well_status_repaired_by',null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('Action Taken') }}</td>
                        <td>{{ Form::select('well_status_action',array('','Repaired','Replaced','No Action'),null,array('class'=>'form-control input-sm','required','style'=>'width:100%')) }}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
            <div class="form-group pull-right">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                   {{ Form::submit('Save',array('class'=>'btn btn-success btn-sm','onClick'=>"saveClick();")) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // STATUS
    if(well_status.value == 'Damage'){
        $('#defunct').hide();
        $('#damage').show();
    }  
    if(well_status.value == 'Defunct') {
        $('#damage').hide();
        $('#defunct').show();
    }
    if(well_status.value == 'In Use') {
        $('#damage').hide();
        $('#defunct').hide();
    }

    // BLOCK LIST
    $.ajax({
        url: "{{ URL::route('tubewell.block')}}",
        data: {'id': district_id.value },
        type: 'GET', 
    }).success(function(data){
        $('#block_id').append(data);
    })

    // PANCHAYAT LIST
    $.ajax({
        url: "{{ URL::route('tubewell.panchayat')}}",
        data: {'id': block_id.value},
        type: 'GET', 
    }).success(function(data){
        $('#panchayat_id').append(data);
    })

    // CIRCLE LIST
    $.ajax({
        url: "{{ URL::route('tubewell.circle')}}",
        data: {'id': office_zone_id.value},
        type: 'GET', 
    }).success(function(data){
        $('#office_circle_id').append(data);
    })

    // DIVISION LIST
    $.ajax({
        url: "{{ URL::route('tubewell.division')}}",
        data: {'id': office_circle_id.value},
        type: 'GET', 
    }).success(function(data){
        $('#office_division_id').append(data);
    })

    // SUB DIVISION LIST
    $.ajax({
        url: "{{ URL::route('tubewell.subdivision')}}",
        data: {'id': office_division_id.value},
        type: 'GET', 
    }).success(function(data){
        $('#office_sub_division_id').append(data);
    })

    // SECTION LIST
    $.ajax({
        url: "{{ URL::route('tubewell.section')}}",
        data: {'id': office_sub_division_id.value},
        type: 'GET', 
    }).success(function(data){
        $('#office_section_id').append(data);
    })

    // STATUS
    /*$.ajax({
        url: "{{ URL::route('tubewell.status')}}",
        data: {'id': well_status.value},
        type: 'GET', 
    }).success(function(data){
        $('#status').html(data);
    })*/

});
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
        if(status == 'Damage'){
            $('#defunct').hide();
            $('#damage').show();
        }  
        if(status == 'Defunct') {
            $('#damage').hide();
            $('#defunct').show();
        }
        if(status == 'In Use') {
            $('#damage').hide();
            $('#defunct').hide();
        }
    }

    function saveClick() {
        if(well_status.value == 'Damage'){
            $('#defunct').remove();
        }  
        if(well_status.value == 'Defunct') {
            $('#damage').remove();
        }
        if(well_status.value == 'In Use') {
            $('#damage').remove();
            $('#defunct').remove();
        }
    }
/*    function status(status){
        $.ajax({
            url: "{{ URL::route('tubewell.status')}}",
            data: {'id': status},
            type: 'GET', 
        }).success(function(data){
            $('#status').html(data);
        })
    }*/
</script>
@stop