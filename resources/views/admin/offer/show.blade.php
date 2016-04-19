@extends('admin.layout')

@section('content')

<h1>{{ $offer->title }}</h1>
<a class="btn btn-primary pull-right" href="{{ url('/admin/offer', $offer->slug . '/edit') }}">Edytuj</a>
<article>		
	<div class="offer-content">
		{!! $offer->content !!}
	</div>
	@if($offer->image_url)
	<div class="offer-image">
			<img src="{!! asset('uploads/thumbs/' . $offer->image_url) !!}">
	</div>
	@endif
</article>

@endsection