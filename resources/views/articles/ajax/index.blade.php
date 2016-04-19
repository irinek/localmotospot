	@foreach ($articles as $article)
		<div class="post col-xs-12">
			<a href="{{ url('/articles', $article->slug) }}"><h2>{{ $article->title }}</h2></a>
			<div class="article-content">{!! $article->content !!}</div>
			@if($article->image_url)
				<img src="{!! $article->image_url !!}">
			@endif
		</div>
	@endforeach