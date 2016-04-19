@extends('admin.layout')

@section('content')

<h1>Projekty</h1>
@foreach ($projects as $project)
<hr>
	<article>
		<a href="{{ url('/admin/projects', $project->slug) }}"><h2>{{ $project->title }}</h2></a>
		<a class="btn btn-primary pull-right" href="{{ url('/admin/projects', $project->slug . '/edit') }}">Edytuj</a>
		
		<div class="article-content">{!! $project->content !!}</div>
		@if($project->image_url)
		<div class="article-image col-xs-12">
			<img src="{!! asset('uploads/' . $project->image_url) !!}">
		</div>
		@endif
	</article>
@endforeach

@endsection