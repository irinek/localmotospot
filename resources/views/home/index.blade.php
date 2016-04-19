@extends('layout')

@section('title', 'Serwis motocyklowy i samochodowy')



@section('logo_home')
<div class="logo-home-hold row">
  <div class="logo-home col-xs-12 text-center">
    <div class="logo-upper">
    	<div class="img-container upper1">
	    	<img class="logo-sm" src="{{  asset('images/logo_home650.png') }}">
	    </div>
    </div>
    <div class="logo-inner inner1">
        <div class="img-container">
        	<img class="logo-sm moto" src="{{ asset('images/logo_line.png') }}">
        </div>
    </div>
    <div class="logo-inner inner2">
        <div class="img-container">
       		<img class="logo-sm moto bp1" src="{{ asset('images/logo_bp1.png') }}">

        </div>
    </div>
    <div class="logo-inner inner2">
	    <div class="img-container">
	      <img class="logo-sm moto bp2 pull-right" src="{{ asset('images/logo_bp2.png') }}">
	    </div>
    </div>
    <div class="logo-inner inner3">
    	<div class="img-container">
        	<img class="logo-sm moto" src="{{ asset('images/logo_line.png') }}">
        </div>
    </div>
      <div class="logo-inner inner4">
        <div class="img-container">
        	<img class="logo-sm moto" src="{{ asset('images/logo_fill.png') }}">
        </div>
    </div>
  </div>
</div>

@endsection

@section('content')

	<div class="over-opening-time row">
		@include('partials.open_time')
	</div>


<div class="fast-links row">
	<div class="col-xs-12 col-sm-4">
		<a  href="offer"><h3>Oferta<span class="glyphicon glyphicon-wrench"></span></h3></a>
	</div>
	<div class="col-xs-12 col-sm-4">
		<a href="contact"><h3>Kontakt<span class="glyphicon glyphicon-envelope"></span></h3></a>
	</div>
	<div class="col-xs-12 col-sm-4">
		<a href="http://allegro.pl/listing/user/listing.php?us_id=42355576"><h3>Sklep<span class="glyphicon glyphicon-shopping-cart"></span></h3></a>
	</div>
</div>

<div class="over-welcome">
	<div class="welcome row">
			<div class="welcome-header col-xs-12">
				<h2>Local Moto Spot</h2>
			</div>
		<div class="welcome-content col-xs-12">
			<p>
				<strong>Serwis motocyklowy i samochodowy.</strong><br>
				Naprawa, diagnostyka komputerowa oraz stylowa customizacja Twojej maszyny pod okiem wykształconego i doświadczonego zespołu wyposażonego w profesjonalne narzędzia. Local Moto Spot to nie tylko warsztat mechaniczny, ale jak wskazuje sama nazwa - <strong>spot motocyklowy</strong> - chcesz spotkać się ze znajomymi na moto lub zbierasz ekipę na wyjazd? – startuj u nas, dla motocyklistów jesteśmy otwarci 7 dni w tygodniu.
			</p>
		</div>
	</div>
</div>

<div class="map row">
	<div class="map-header text-center">
		<h2>Dojazd</h2>
	</div>
	@include('partials.gmap')
</div>

@endsection