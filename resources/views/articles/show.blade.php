@extends('layout')

@section('title', 'Aktualności')

@section('breadcrumbs')

<div class="breadcrumb-container col-xs-12 col-sm-8 pull-left">
  <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/articles">Aktualności</a></li>
        <li class="active"><a href="{{ url('/articles', $article->slug) }}">{{ $article->title }}</a></li>
  </ol>
</div>

@endsection

@section('content')

<div class="articles">

		<div class="post row">
        <div class="article-header col-xs-12">
            <h2>{{ $article->title }}</h2>
            <p><small>Dodano: {{ $article->published_at }}</small></p>
        </div>

				<div class="article-content col-xs-12">
          {!! $article->content !!}
        </div>

        @if($article->image_url)
        <div class="article-image col-xs-12 text-center">
					<img src="{!! asset('uploads/' . $article->image_url) !!}">
        </div>
        @endif
        <div class="col-xs-12">
    		<button class="btn btn-primary btn-lg" onclick="history.go(-1)">Wróć</button>
        </div>
    </div> 

		
</div>

@endsection