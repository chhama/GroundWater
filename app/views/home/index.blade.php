@extends('layout')

@section('extrahead')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCaK-bdUb0IjlKsaMGlI9s757fcM823lWM&sensor=false">
</script>

<script>
	function initialize()
	{
		
			var mapProp = {
			 	center:new google.maps.LatLng(23.727107,92.7176389),
			  	zoom:5,
			  	mapTypeId:google.maps.MapTypeId.ROADMAP
			};

			var map=new google.maps.Map(document.getElementById("googleMap")
			  ,mapProp);

	}

	google.maps.event.addDomListener(window, 'load', initialize);


	function diffrnt(data)
	{
		// GET http://dev.groundwater/map/%22+data+%22/getLatlong 500 (Internal Server Error) 
			$.ajax({
				url: '/map/' + data + '/getLatlong',// "{{ URL::route('map.getLatlong',array('id'=>'"+data+"')) }}",
				type: 'GET',
				 data: {'id' : data},
				 type: 'GET',
				success: function(data){
					var data=JSON.parse(data);

					$('#tubewell_info').html("<div class='panel panel-info'><div class='panel-heading'>Tubewell Information</div><div class='panel-body'><table cellpadding=5 class='table table-striped table-hover' style='width:200px'><tr><td><strong>Tubewell Code</td><td>"
					        +data[2]+"<td><strong>Location</strong></td><td>"
					        +data[3]+"</td><td><strong>Sub-Location</td><td>"
					        +data[4]+"</td><td><strong>Landmark</td><td>"
					        +data[5]+"</td><td><strong>Latitude</td><td>"
					        +data[0]+"</td><td><strong>Longitude</td><td>"
					        +data[1]+"</td><td><strong>Elevation</td><td>"
					        +data[6]+"</td><td><strong>Depth of SWL</td><td>"
					        +data[7]+"</td><td><strong>Depth of Boring</td><td>"
					        +data[8]+"</td><td><strong>Size of Boring</td><td>"
					        +data[9]+"</td></tr><tr><td><strong>Drilling Date</td><td>"
					        +data[10]+"</td><td><strong>Commission Date</td><td>"
					        +data[11]+"</td><td><strong>Discharge</td><td>"
					        +data[12]+"</td><td><strong>Platform?</td><td>"
					        +data[13]+"</td><td><strong>Tubewell Status</td><td>"
					        +data[14]+"</td><td><strong>Tubewell Status Date</td><td>"
					        +data[15]+"</td><td><strong>Note</td><td>"
					        +data[16]+"</td><td><strong>Nature of Damage</td><td>"
					        +data[17]+"</td><td><strong>Action</td><td>"
					        +data[18]+"</td><td><strong>Repaired Date</td><td>"
					        +data[19]+"</td></tr><tr><td><strong>Repaired by</td><td>"
					        +data[20]+"</td><td><strong>Mode of Delivery</td><td>"
					        +data[21]+"</td><td><strong>District</td><td>"
					        +data[22]+"</td><td><strong>Block</td><td>"
					        +data[23]+"</td><td><strong>Panchayat</td><td>"
					        +data[24]+"</td><td><strong>Zone</td><td>"
					        +data[25]+"</td><td><strong>Circle</td><td>"
					        +data[26]+"</td><td><strong>Division</td><td>"
					        +data[27]+"</td><td><strong>Sub-Division</td><td>"
					        +data[28]+"</td><td><strong>Section</td><td>"
     						+data[29]+"</td></tr></table></div></div>");

			        // alert(data);
			        myCenter=  new google.maps.LatLng(data[0],data[1]);
					var mapProp = {
						center:myCenter,
						zoom:17,
						mapTypeId:google.maps.MapTypeId.SATELLITE
					};



					var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

					var marker=new google.maps.Marker({
					        position:myCenter,
					});
					  
					marker.setMap(map);

					var infowindow = new google.maps.InfoWindow({
					        content: "<table cellpadding=5 class='table table-striped table-hover' style='width:200px'><tr><td><strong>Tubewell Code</td><td>"
					        +data[2]+"<td><strong>Location</strong></td><td>"
					        +data[3]+"</td><td><strong>Sub-Location</td><td>"
					        +data[4]+"</td><td><strong>Landmark</td><td>"
					        +data[5]+"</td></tr><tr><td><strong>Latitude</td><td>"
					        +data[0]+"</td><td><strong>Longitude</td><td>"
					        +data[1]+"</td><td><strong>Elevation</td><td>"
					        +data[6]+"</td><td><strong>Depth of SWL</td><td>"
					        +data[7]+"</td></tr><tr><td><strong>Depth of Boring</td><td>"
					        +data[8]+"</td><td><strong>Size of Boring</td><td>"
					        +data[9]+"</td><td><strong>Drilling Date</td><td>"
					        +data[10]+"</td><td><strong>Commission Date</td><td>"
					        +data[11]+"</td></tr><tr><td><strong>Discharge</td><td>"
					        +data[12]+"</td><td><strong>Platform?</td><td>"
					        +data[13]+"</td><td><strong>Tubewell Status</td><td>"
					        +data[14]+"</td><td><strong>Tubewell Status Date</td><td>"
					        +data[15]+"</td></tr><tr><td><strong>Note</td><td>"
					        +data[16]+"</td><td><strong>Nature of Damage</td><td>"
					        +data[17]+"</td><td><strong>Action</td><td>"
					        +data[18]+"</td><td><strong>Repaired Date</td><td>"
					        +data[19]+"</td></tr><tr><td><strong>Repaired by</td><td>"
					        +data[20]+"</td><td><strong>Mode of Delivery</td><td>"
					        +data[21]+"</td><td><strong>District</td><td>"
					        +data[22]+"</td><td><strong>Block</td><td>"
					        +data[23]+"</td></tr><tr><td><strong>Panchayat</td><td>"
					        +data[24]+"</td><td><strong>Zone</td><td>"
					        +data[25]+"</td><td><strong>Circle</td><td>"
					        +data[26]+"</td><td><strong>Division</td><td>"
					        +data[27]+"</td></tr><tr><td><strong>Sub-Division</td><td>"
					        +data[28]+"</td><td><strong>Section</td><td>"
     						+data[29]+"</td></tr></table>"

		

					        				

					    });


				 	infowindow.open(map,marker);
						// alert(data);
				}
			});


	        // myCenter=  new google.maps.LatLng(document.getElementById('lati').value,document.getElementById('longi').value);

	// 		var mapProp = {
	// 		center:myCenter,
	// 		zoom:20,
	// 		mapTypeId:google.maps.MapTypeId.SATELLITE
	// };



	// var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

	// var marker=new google.maps.Marker({
	//         position:myCenter,
	// });
	  
	// marker.setMap(map);

	// var infowindow = new google.maps.InfoWindow({
	//         content: "Hello<br>what"
	// });


 // 	infowindow.open(map,marker);

}

// google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop

@section('container')

	<div class="col-md-9">
		<div id="googleMap" style="width:100%;height:560px;"></div>
	</div>

	<div class="col-md-3">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				Locate tubewell
			</div>
			<div class="panel-body">
				{{Form::text('tubewell_id','',['class'=>'form-control','id'=>'tubewell_id','placeholder'=>'Enter Tubewell ID'])}}
				<p></p>
				<button onclick="diffrnt(document.getElementById('tubewell_id').value)" class='form-control btn btn-default'>Display</button>		
			</div>
		</div>
		

	</div>
	<div class="row"></div>
	<div class="col-md-12" id='tubewell_info' style="margin-top:20px;">
		
			
</div>


@stop
