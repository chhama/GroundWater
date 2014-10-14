@extends('layout')

@section('extrahead')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCaK-bdUb0IjlKsaMGlI9s757fcM823lWM&sensor=false">
</script>

<script>
	function initialize()
	{
			$.ajax({
				url: "{{ URL::route('map.getLatlong') }}",
				type: 'GET',
				// data: {id: '3'}

				success: function(data){
				alert(data);
				}
			});
			

			// var mapProp = {
			//   center:new google.maps.LatLng(51.508742,-0.120850),
			//   zoom:5,
			//   mapTypeId:google.maps.MapTypeId.ROADMAP
			//   };

			// var map=new google.maps.Map(document.getElementById("googleMap")
			//   ,mapProp);

	}

	google.maps.event.addDomListener(window, 'load', initialize);


	function diffrnt()
	{
	        myCenter=  new google.maps.LatLng(document.getElementById('lati').value,document.getElementById('longi').value);

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
				{{Form::text('lati','',['class'=>'form-control','id'=>'lati','placeholder'=>'Enter Tubewell ID'])}}
				<p></p>
				<button onclick="diffrnt()" class='form-control btn btn-default'>Display</button>		
			</div>
		</div>
		

	</div>


@stop
