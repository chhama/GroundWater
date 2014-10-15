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

			$.ajax({
				url: "{{ URL::route('map.getLatlong') }}",
				type: 'GET',
				 data: id = 'data',
				 dataType: 'json',
				success: function(data){
					// data=parseJSON(data);
					alert(data.latitude;
					console.log(data.latitude;

			        myCenter=  new google.maps.LatLng(data.latitude.value,data.longitude.value);
			        
					var mapProp = {
						center:myCenter,
						zoom:20,
						mapTypeId:google.maps.MapTypeId.SATELLITE
					};



					var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

					var marker=new google.maps.Marker({
					        position:myCenter,
					});
					  
					marker.setMap(map);

					var infowindow = new google.maps.InfoWindow({
					        content: "Hello<br>what"
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
			<?php  
		$lat=Tubewell::where('tubewell_code','=',1)->select('latitude')->first();
			$longi=Tubewell::where('tubewell_code','=',1)->select('longitude')->first();

			$arrvalue=array($lat,$longi);
			
			echo json_encode($arrvalue);
?>

				{{Form::text('tubewell_id','',['class'=>'form-control','id'=>'tubewell_id','placeholder'=>'Enter Tubewell ID'])}}
				<p></p>
				<button onclick="diffrnt(tubewell_id.value)" class='form-control btn btn-default'>Display</button>		
			</div>
		</div>
		

	</div>


@stop
