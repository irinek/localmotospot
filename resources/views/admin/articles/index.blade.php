@extends('admin.layout')

@section('content')

<h1>Artykuły</h1>
@foreach ($articles as $article)
<hr>
	<article>
		<a href="{{ url('/admin/articles', $article->slug) }}"><h2>{{ $article->title }}</h2></a>
		<a class="btn btn-primary pull-right" href="{{ url('/admin/articles', $article->slug . '/edit') }}">Edytuj</a>
		
		<div class="article-content">{!! $article->content !!}</div>
		@if($article->image_url)
		<div class="article-image col-xs-12">
			<img src="{!! asset('uploads/' . $article->image_url) !!}">
		</div>
		@endif
	</article>
@endforeach

@endsection