@extends('admin.layout')

@section('content')

<h1>Oferta</h1>

@foreach ($offers as $offer)
<hr>
	<div>

		<a href="{{ url('/admin/offer', $offer->slug) }}"><h2>{{ $offer->title }}</h2></a>
		<a class="btn btn-primary pull-right" href="{{ url('/admin/offer', $offer->slug . '/edit') }}">Edytuj</a>

		<div class="offer-content">
			{!! $offer->content !!}
		</div>

		@if($offer->image_url)
			<div class="offer-image">
				<img src="{!! asset('uploads/thumbs/' . $offer->image_url) !!}">
			</div>
		@endif
	</div>
	@endforeach

@endsection