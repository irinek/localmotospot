@extends('layout')

@section('title', 'Oferta')

@section('breadcrumbs')

<div class="breadcrumb-container col-xs-12 col-sm-8 pull-left">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active"><a href="/offer">Oferta</a></li>
    </ol>
</div>

@endsection

@section('content')

<div class="articles">

<div class="post">
	@foreach ($offers as $offer)

		<div class="row">
        <div class="article-header col-xs-12">
    			<a href="{{ url('/offer', $offer->slug) }}">
                    <h2>{{ $offer->title }}</h2>
          </a>
        </div>

			<div class="article-content col-xs-12 col-sm-7">
                {!! $offer->content !!}
            </div>

            @if($offer->image_url)
            <div class="offer-image col-xs-12 col-sm-5 text-center">
				<img src="{!! asset('uploads/thumbs/' . $offer->image_url) !!}">
            </div>
            @endif

        </div>
        <hr class="sexyline2"/>
    @endforeach
</div>
</div>

@endsection