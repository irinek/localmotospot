@extends('layout')

@section('title', 'Aktualności')

@section('breadcrumbs')

<div class="breadcrumb-container col-xs-12 col-sm-8 pull-left">
  <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active"><a href="/articles">Aktualności</a></li>
  </ol>
</div>

@endsection

@section('content')

<div class="articles endless-pagination" data-next-page="{{ $articles->nextPageUrl() }}">
    <div class="post">
	@foreach ($articles as $article)
		<div class="row">
            <div class="article-header col-xs-12">
    			<a href="{{ url('/articles', $article->slug) }}">
                    <h2>{{ $article->title }}</h2>
                </a>
                <p><small>Dodano: {{ $article->published_at }}</small></p>
            </div>

			<div class="article-content col-xs-12">
                {!! $article->content !!}
            </div>

            @if($article->image_url)
            <div class="article-image col-xs-12 text-center">
				<img src="{!! asset('uploads/' .  $article->image_url) !!}">
            </div>
            @endif
        </div>
        <hr class="sexyline2"/>
    @endforeach
    </div>
    <div class="col-xs-12 text-center">
        {!! $articles->render() !!}
    </div>
</div>
@endsection