<div id="map-canvas"></div>

<div class="route-form col-xs-12">
	{!! Form::open(['url' => '#', 'method' => 'GET', 'id' => 'calculate-route', 'name' => 'calculate-route']) !!}
	
	<div class="form-group col-xs-12">
		{!! Form:: label('from', 'Początek trasy:') !!}
		{!! Form::text('from', null, ['placeholder' => 'Wpisz adres początkowy trasy', 'required' => true, 'class' => 'form-control']) !!}

  	{!! Form::hidden('to', 'Fedkowicza 12, 30-381 Kraków, Polska', ['id' => 'to', 'required' => true, 'class' => 'form-control']) !!}
	</div>
	
	<div class="form-group col-xs-12 col-sm-6">
		{!! Form::button('Pobierz moją lokalizaję', ['href' => '#', 'id' => 'from-link', 'class' => 'btn btn-primary form-control']) !!}
	</div>

	<div class="form-group col-xs-12 col-sm-6">
		{!! Form::submit('Wyznacz trasę', ['class' => 'form-control btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
</div>

@section('scripts')

<script type="text/javascript">
	var map;
	function initMap() {
		var LMS = new google.maps.LatLng(50.01812, 19.83952);
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			scrollwheel: false,
			draggable: true,
			center: LMS,
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var contentString = 
			'<div class="marker-content text-center">'+
			'<h4>Local Moto Spot</h4>'+
			'<p>Fedkowicza 12, 30-381 Kraków</p>' +
			'<a href="tel: 790 476 740">Tel.: 790 476 740</a>' +
			'</div>';

		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		var marker = new google.maps.Marker({
			position: LMS,
			map: map,
			title: 'Local Moto Spot Kraków'
		});
		marker.addListener('click', function() {
			infowindow.open(map, marker);
		});
	}   

	function calculateRoute(from, to) {
		var myOptions = {
		zoom: 10,
		center: new google.maps.LatLng(50.01812, 19.83952),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel:false,
		draggable: true
	};

	var mapObject = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

	var directionsService = new google.maps.DirectionsService();

	var directionsRequest = {
		origin: from,
		destination: to,
		travelMode: google.maps.DirectionsTravelMode.DRIVING,
		unitSystem: google.maps.UnitSystem.METRIC
	};

	directionsService.route(directionsRequest, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			new google.maps.DirectionsRenderer({
				map: mapObject,
				directions: response
			});
		}
		else
			alert("Nie można wyznaczyć trasy.");
	});
}

$(document).ready(function() {
	if (typeof navigator.geolocation == "undefined") {
		alert("Twoja przeglądarka nie obsługuje Geolocation API.");
		return;
	}

	$("#from-link").click(function(event) {
		event.preventDefault();
		var addressId = this.id.substring(0, this.id.indexOf("-"));

		navigator.geolocation.getCurrentPosition(function(position) {
			var geocoder = new google.maps.Geocoder();
				geocoder.geocode({
					"location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
				},
				function(results, status) {
					if (status == google.maps.GeocoderStatus.OK)
						$("#" + addressId).val(results[0].formatted_address);
					else
						alert("Nie można pobrać adresu");
				}
			);
		},
	function(positionError){
		alert("Error: " + positionError.message);
	},
	{
		enableHighAccuracy: true,
		timeout: 10 * 1000 // 10 seconds
	});
});

$("#calculate-route").submit(function(event) {
	event.preventDefault();
	calculateRoute($("#from").val(), $("#to").val());
});
});
</script>

<script>

$(document).ready(function() { 

checkSize();

$(window).resize(checkSize);

function checkSize(){
    if ($(".img-container").css("position") == "fixed" ){
			var x1 = $('.logo-home-hold').outerHeight();
			var x2 = x1 + $('.page-header').outerHeight();
			$('.inner1').css({'clip' : 'rect(' + x1 + 'px, auto,' + x2 + 'px, auto)', 'display' : 'block'});
			x1 = x2 + $('.over-opening-time').outerHeight();
			$('.inner2').css({'clip' : 'rect(' + x2 + 'px, auto,' + x1 + 'px, auto)', 'display' : 'block'});
			x2 = x1 + $('.fast-links').outerHeight(); //1123
			$('.inner3').css({'clip' : 'rect(' + x1 + 'px, auto,' + x2 + 'px, auto)', 'display' : 'block'});
			x1 = x2 + $('.over-welcome').outerHeight(); //1301
			$('.inner4').css({'clip' : 'rect(' + x2 + 'px, auto,' + x1 + 'px, auto)', 'display' : 'block'});

			var documentEl = $(document);
      var parallaxBg = $('div.img-container');
            
      documentEl.on('scroll', function() {
        var currScrollPos = documentEl.scrollTop();
          parallaxBg.css('top', currScrollPos*(-0.1) + 'px');
      });
    }
    else {
    	$('.inner1, .inner2, .inner3, .inner4').css('display', 'none');

    }
}
            
$('#to-the-top').on('click', function() {
	$('html,body').animate({scrollTop: 0}, 800);
});
            

});
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApVPgP2s_VmEvVOBhbKzww-WOqpH0hpe4&callback=initMap"
async defer></script>
@endsection