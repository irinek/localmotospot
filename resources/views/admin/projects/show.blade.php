@extends('admin.layout')

@section('content')

<h1>{{ $project->title }}</h1>
<a class="btn btn-primary pull-right" href="{{ url('/admin/projects', $project->slug . '/edit') }}">Edytuj</a>
<article>		
	<div class="article-content">
		{!! $project->content !!}
	</div>
	@if($project->image_url)
	<div class="article-image">
		<img src="{!! asset('uploads/' . $project->image_url) !!}">
	</div>
	@endif
	<div class="article-image">
	@foreach($images as $image)
			<img src="{!! asset('uploads/' . $image->file) !!}">
	@endforeach
	</div>
</article>

@endsection