@extends('layout')

@section('container')


<div class="col-md-12">

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Water Quality Report</h4>
	</div>
	<div class="panel-body">
	   	<table class="table table-bordered table-striped table-hover">
	   		<thead>
			<tr>
	   			<th class="text-center col-md-1">Sl/No</th>
	   			<th class="col-md-3">Parameter</th>
	   			<th class="text-center col-md-3">Requirement (Acceptable Limit) - BLACK</th>
	   			<th class="text-center col-md-3">Permissible limit in the absence of alternate source - GREEN</th>
	   			<th class="text-center col-md-2">Above Desirable limit - RED</th>
	   		</tr>  		    
			</thead>
	   	<tbody>
	   		<tr>
	   			<td class="text-center">1.</td>
	   			<td>Tubewell ID</td>
	   			<td class="text-center">{{ $waterQualityById->tubewell_id }}</td>
	   			<td class="text-center">{{ $waterQualityById->tubewell_id }}</td>
	   			<td class="text-center">{{ $waterQualityById->tubewell_id }}</td>
	   		</tr>
	   		<tr>
	   			<td class="text-center">2.</td>
	   			<td>pH</td>
		    	<td class="text-center">6.5 – 8.5</td>
		    	<td class="text-center">-</td>
		    	<td class="text-center">{{ $waterQualityById->ph }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">3.</td>
		    	<td>Colour</td>
		    	<td class="text-center">5</td>
		    	<td class="text-center">15</td>
		    	<td class="text-center">{{ $waterQualityById->colour }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">4.</td>
		    	<td>Odour</td>
		    	<td class="text-center">Unobjectionable</td>
		    	<td class="text-center">-</td>
		    	<td class="text-center">{{ $waterQualityById->odour }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">5.</td>
		    	<td>Taste</td>
		    	<td class="text-center">Agreeable</td>
		    	<td class="text-center">-</td>
		    	<td class="text-center">{{ $waterQualityById->taste }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">6.</td>
		    	<td>Turbidity</td>
		    	<td class="text-center">1</td>
		    	<td class="text-center">5</td>
		    	<td class="text-center">{{ $waterQualityById->turbidity }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">7.</td>
		    	<td>Total hardness as CaCO3, Max</td>
		    	<td class="text-center">200</td>
		    	<td class="text-center">600</td>
		    	<td class="text-center">{{ $waterQualityById->caco3 }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">8.</td>
		    	<td>Ammonia</td>
		    	<td class="text-center">0.5</td>
		    	<td class="text-center">0.5</td>
		    	<td class="text-center">{{ $waterQualityById->ammonia }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">9.</td>
		    	<td>Iron as Fe, Max</td>
		    	<td class="text-center">0.3</td>
		    	<td class="text-center">0.3</td>
		    	<td class="text-center">{{ $waterQualityById->iron }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">10.</td>
		    	<td>Chlorides as Cl, Max</td>
		    	<td class="text-center">250</td>
		    	<td class="text-center">1000</td>
		    	<td class="text-center">{{ $waterQualityById->chlorides }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">11.</td>
		    	<td>Free Residual</td>
		    	<td class="text-center">0.2</td>
		    	<td class="text-center">1</td>
		    	<td class="text-center">{{ $waterQualityById->free_residual }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">12.</td>
		    	<td>Dissolved Solid, Max</td>
		    	<td class="text-center">500</td>
		    	<td class="text-center">2000</td>
		    	<td class="text-center">{{ $waterQualityById->dissolved_solid }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">13.</td>
		    	<td>Calcium as Ca, Max</td>
		    	<td class="text-center">75</td>
		    	<td class="text-center">200</td>
		    	<td class="text-center">{{ $waterQualityById->calcium }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">14.</td>
		    	<td>Magnesium as Mg, Max</td>
		    	<td class="text-center">30</td>
		    	<td class="text-center">100</td>
		    	<td class="text-center">{{ $waterQualityById->magnesium }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">15.</td>
		    	<td>Copper as Cu, Max</td>
		    	<td class="text-center">0.05</td>
		    	<td class="text-center">1.5</td>
		    	<td class="text-center">{{ $waterQualityById->copper }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">16.</td>
		    	<td>Manganese as Mn, Max</td>
		    	<td class="text-center">0.1</td>
		    	<td class="text-center">0.3</td>
		    	<td class="text-center">{{ $waterQualityById->manganese }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">17.</td>
		    	<td>Sulphate as SO4, Max</td>
		    	<td class="text-center">200</td>
		    	<td class="text-center">400</td>
		    	<td class="text-center">{{ $waterQualityById->sulphate }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">18.</td>
		    	<td>Nitrates as NO3</td>
		    	<td class="text-center">45</td>
		    	<td class="text-center">45</td>
		    	<td class="text-center">{{ $waterQualityById->nitrates }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">19.</td>
		    	<td>Fluoride, Max</td>
		    	<td class="text-center">1.0</td>
		    	<td class="text-center">1.5</td>
		    	<td class="text-center">{{ $waterQualityById->fluoride }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">20.</td>
		    	<td>Phenolic compounds as C6H5OH, Max</td>
		    	<td class="text-center">0.001</td>
		    	<td class="text-center">0.002</td>
		    	<td class="text-center">{{ $waterQualityById->phenolic }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">21.</td>
		    	<td>Mercury as Hg, Max</td>
		    	<td class="text-center">0.001</td>
		    	<td class="text-center">0.001</td>
		    	<td class="text-center">{{ $waterQualityById->mercury }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">22.</td>
		    	<td>Cadmium as Cd, Max</td>
		    	<td class="text-center">0.003</td>
		    	<td class="text-center">0.003</td>
		    	<td class="text-center">{{ $waterQualityById->cadmium }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">23.</td>
		    	<td>Selenium as Se, Max</td>
		    	<td class="text-center">0.01</td>
		    	<td class="text-center">0.01</td>
		    	<td class="text-center">{{ $waterQualityById->selenium }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">24.</td>
		    	<td>Arsenic as As, Max</td>
		    	<td class="text-center">-</td>
		    	<td class="text-center">0.05</td>
		    	<td class="text-center">{{ $waterQualityById->arsenic }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">25.</td>
		    	<td>Cyanide as CN, Max</td>
		    	<td class="text-center">0.05</td>
		    	<td class="text-center">0.05</td>
		    	<td class="text-center">{{ $waterQualityById->cyanide }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">26.</td>
		    	<td>Lead as Pb, Max</td>
		    	<td class="text-center">0.01</td>
		    	<td class="text-center">0.01</td>
		    	<td class="text-center">{{ $waterQualityById->lead }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">27.</td>
		    	<td>Zinc as Zn, Max</td>
		    	<td class="text-center">5</td>
		    	<td class="text-center">15</td>
		    	<td class="text-center">{{ $waterQualityById->zinc }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">28.</td>
		    	<td>Anionic detergents as MBAS, Max</td>
		    	<td class="text-center">0.2</td>
		    	<td class="text-center">1</td>
		    	<td class="text-center">{{ $waterQualityById->anionic }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">29.</td>
		    	<td>Chromium as Cr6+, Max</td>
		    	<td class="text-center">0.05</td>
		    	<td class="text-center">0.05</td>
		    	<td class="text-center">{{ $waterQualityById->chromium }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">30.</td>
		    	<td>Ploynuclear aromatic hydrocarbons as PAH, Max</td>
		    	<td class="text-center">-</td>
		    	<td class="text-center">-</td>
		    	<td class="text-center">{{ $waterQualityById->polynuclear }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">31.</td>
		    	<td>Mineral Oil, Max</td>
		    	<td class="text-center">0.01</td>
		    	<td class="text-center">0.03</td>
		    	<td class="text-center">{{ $waterQualityById->mineral_oil }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">32.</td>
		    	<td>Pesticides, Max</td>
		    	<td class="text-center">Absent</td>
		    	<td class="text-center">0.001</td>
		    	<td class="text-center">{{ $waterQualityById->pesticides }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">33.</td>
		    	<td>Radioactive</td>
		    	<td class="text-center">{{ $waterQualityById->radioactive }}</td>
		    	<td class="text-center">{{ $waterQualityById->radioactive }}</td>
		    	<td class="text-center">{{ $waterQualityById->radioactive }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">34.</td>
		    	<td>Alkalinity, Max</td>
		    	<td class="text-center">200</td>
		    	<td class="text-center">600</td>
		    	<td class="text-center">{{ $waterQualityById->alkalinity }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">35.</td>
		    	<td>Aluminum as Al, Max</td>
		    	<td class="text-center">0.03</td>
		    	<td class="text-center">0.2</td>
		    	<td class="text-center">{{ $waterQualityById->aluminium }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">36.</td>
		    	<td>Boron, Max</td>
		    	<td class="text-center">1</td>
		    	<td class="text-center">5</td>
		    	<td class="text-center">{{ $waterQualityById->boron }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">37.</td>
		    	<td>Nickel</td>
		    	<td class="text-center">0.02</td>
		    	<td class="text-center">0.02</td>
		    	<td class="text-center">{{ $waterQualityById->nickel }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">38.</td>
		    	<td>E-coli or Thermotolerant Coliforms (No/100ml)</td>
		    	<td class="text-center">-</td>
		    	<td class="text-center">-</td>
		    	<td class="text-center">{{ $waterQualityById->ecoli }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">39.</td>
		    	<td>Tested by</td>
		    	<td class="text-center">{{ $waterQualityById->tested_by }}</td>
		    	<td class="text-center">{{ $waterQualityById->tested_by }}</td>
		    	<td class="text-center">{{ $waterQualityById->tested_by }}</td>
		    </tr>
		    <tr>
	   			<td class="text-center">40.</td>
		    	<td>Date of Testing</td>
		    	<td class="text-center">{{ $waterQualityById->test_date }}</td>
		    	<td class="text-center">{{ $waterQualityById->test_date }}</td>
		    	<td class="text-center">{{ $waterQualityById->test_date }}</td>
		    </tr>		    
	   	</tbody>
	   </table>
	</div>
</div>

	 <script language='javascript'>

      
        $('#datetimepicker').datetimepicker({
            step: 5
        });

    </script>

@stop