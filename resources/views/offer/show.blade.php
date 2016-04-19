@extends('layout')

@section('title', 'Oferta')

@section('breadcrumbs')

<div class="breadcrumb-container col-xs-12 col-sm-8 pull-left">
  <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/offer">Oferta</a></li>
        <li class="active"><a href="{{ url('/offer', $offer->slug) }}">{{ $offer->title }}</a></li>
  </ol>
</div>

@endsection

@section('content')

<div class="articles">

        <div class="post row">
        <div class="article-header col-xs-12">
        <h2>{{ $offer->title }}</h2>
        </div>

            <div class="article-content col-xs-12 col-sm-7">
                {!! $offer->content !!}
            </div>

            @if($offer->image_url)
            <div class="offer-image col-xs-12 col-sm-5">
                <img src="{!! asset('uploads/thumbs/' . $offer->image_url) !!}">
            </div>
            @endif

            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg" onclick="history.go(-1)">Wróć</button>
            </div>
        </div>

        
</div>
@endsection

