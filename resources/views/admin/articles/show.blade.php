@extends('admin.layout')

@section('content')

<h1>{{ $article->title }}</h1>
<a class="btn btn-primary pull-right" href="{{ url('/admin/articles', $article->slug . '/edit') }}">Edytuj</a>
<article>		
	<div class="article-content">
		{!! $article->content !!}
	</div>
	@if($article->image_url)
	<div class="article-image">
			<img src="{!! asset('uploads/' . $article->image_url) !!}">
	</div>
	@endif
</article>

@endsection