@extends('layout')

@section('container')


<div class="col-md-12">

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>New Water Quality Test Record</h4>
	</div>
	<div class="panel-body">
  	{{Form::open(['route'=>'waterquality.store','class'=>'navbar-form'])}}
	   	<table class="table table-striped table-hover">
	   		<thead>
				  		    
			</thead>
	   	<tbody>
	   
	   		<tr><td>{{Form::Label('','Tubewell ID')}}</td>
	   		<td>{{Form::text('tubewell_id','',['class'=>'form-control'])}}</td>
	   				<td>{{Form::Label('','pH')}}</td>
		    <td>{{Form::text('ph','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Colour')}}</td>
		    <td>{{Form::text('colour','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Odour')}}</td>
		    <td>{{Form::text('odour','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Taste')}}</td>
		    <td>{{Form::text('taste','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Turbidity')}}</td>
		    <td>{{Form::text('turbidity','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','CaCO3')}}</td>
		    <td>{{Form::text('caco3','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Ammonia')}}</td>
		    <td>{{Form::text('ammonia','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Iron')}}</td>
		    <td>{{Form::text('iron','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Chlorides')}}</td>
		    <td>{{Form::text('chlorides','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Free Residual')}}</td>
		    <td>{{Form::text('free_residual','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Dissolved Solid')}}</td>
		    <td>{{Form::text('dissolved_solid','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Calcium')}}</td>
		    <td>{{Form::text('calcium','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Magnesium')}}</td>
		    <td>{{Form::text('magnesium','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Copper')}}</td>
		    <td>{{Form::text('copper','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Manganese')}}</td>
		    <td>{{Form::text('manganese','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Sulphates')}}</td>
		    <td>{{Form::text('sulphate','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Nitrates')}}</td>
		    <td>{{Form::text('nitrates','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Fluoride')}}</td>
		    <td>{{Form::text('fluoride','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Phenolic')}}</td>
		    <td>{{Form::text('phenolic','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Mercury')}}</td>
		    <td>{{Form::text('mercury','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Cadmium')}}</td>
		    <td>{{Form::text('cadmium','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Selenium')}}</td>
		    <td>{{Form::text('selenium','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Arsenic')}}</td>
		    <td>{{Form::text('arsenic','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Cyanide')}}</td>
		    <td>{{Form::text('cyanide','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Lead')}}</td>
		    <td>{{Form::text('lead','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Zinc')}}</td>
		    <td>{{Form::text('zinc','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Anionic')}}</td>
		    <td>{{Form::text('anionic','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Chromium')}}</td>
		    <td>{{Form::text('chromium','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Polynuclear')}}</td>
		    <td>{{Form::text('polynuclear','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Mineral Oil')}}</td>
		    <td>{{Form::text('mineral_oil','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Pesticides')}}</td>
		    <td>{{Form::text('pesticides','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Radioactive')}}</td>
		    <td>{{Form::text('radioactive','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Alkalinity')}}</td>
		    <td>{{Form::text('alkalinity','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Aluminium')}}</td>
		    <td>{{Form::text('aluminium','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Boron')}}</td>
		    <td>{{Form::text('boron','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Nickel')}}</td>
		    <td>{{Form::text('nickel','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Ecoli')}}</td>
		    <td>{{Form::text('ecoli','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Tested by')}}</td>
		    <td>{{Form::text('tested_by','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Date of Testing')}}</td>
		    <td>
	    	<div class="input-group">
				{{Form::text('test_date',date('Y-m-d'),['class'=>'form-control input-sm','id'=>'datetimepicker'])}}
		    	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
		    </div>
			</td></tr>
		    
	   	</tbody>
	   </table>
	   {{Form::submit('Submit',['class'=>'form-control btn btn-info pull-right'])}}
	   {{Form::close()}}

	</div>
</div>

	 <script language='javascript'>

      
        $('#datetimepicker').datetimepicker({
            step: 5
        });

    </script>

@stop