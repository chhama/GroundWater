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
				url: '	/map/' + data + '/getLatlong',// "{{ URL::route('map.getLatlong',array('id'=>'"+data+"')) }}",
				type: 'GET',
				 data: {'id' : data},
				 type: 'GET',
				success: function(data){

					$('#tubewell_info').html("<table cellpadding=5 class='table table-striped' style='width:200px'><tr><td>ph</td><td>"
					        +data[2]+"</tr><tr><td>Colour</td><td>"
					        +data[3]+"</td></tr><tr><td>Odour</td><td>"
					        +data[4]+"</td></tr><tr><td>Taste</td><td>"
					        +data[5]+"</td></tr></table>");

					var data=JSON.parse(data);
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
					        content: "<table cellpadding=5 class='table table-striped' style='width:200px'><tr><td>ph</td><td>"
					        +data[2]+"</tr><tr><td>Colour</td><td>"
					        +data[3]+"</td></tr><tr><td>Odour</td><td>"
					        +data[4]+"</td></tr><tr><td>Taste</td><td>"
					        +data[5]+"</td></tr></table>"

					        				

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
	<div class="col-md-9"></div>

	<div class="col-md-3" id='tubewell_info'>
		
	</div>


@stop
