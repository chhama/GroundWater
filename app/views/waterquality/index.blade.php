@extends('layout')

@section('container')


<div class="col-md-12">

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>New Water Quality Test Record</h4>
	</div>
	<div class="panel-body">
	   <table class="table table-striped table-hover">
	   	<thead>
				  
				    
				    
		</thead>
	   	<tbody>
	   		<tr><td>{{Form::Label('','Tubewell ID')}}</td>
	   		<td>{{Form::text('','',['class'=>'form-control'])}}</td>
	   				<td>{{Form::Label('','pH')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Colour')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Odour')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Taste')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Turbidity')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','CaCO3')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Ammonia')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Iron')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Chlorides')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Free Residual')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Dissolved Solid')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Calcium')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Magnesium')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Copper')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Manganese')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Sulphates')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Nitrates')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Fluoride')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Phenolic')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Mercury')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Cadmium')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Selenium')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Arsenic')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Cyanide')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Lead')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Zinc')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Anionic')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Chromium')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Polynuclear')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Mineral Oil')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Pesticides')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Radioactive')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Alkalinity')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Aluminium')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Boron')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr><tr>
		    		<td>{{Form::Label('','Nickel')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Ecoli')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Tested by')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td>
		    		<td>{{Form::Label('','Test date')}}</td>
		    <td>{{Form::text('','',['class'=>'form-control'])}}</td></tr>
	   	</tbody>
	   </table>
	   {{Form::button('Submit',['class'=>'form-control btn btn-info'])}}
	</div>
</div>

	

@stop