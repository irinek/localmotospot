@extends('layout')

@section('title', 'Projekty')

@section('breadcrumbs')

<div class="breadcrumb-container col-xs-12 col-sm-8 pull-left">
  <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/projects">Projekty</a></li>
        <li class="active"><a href="{{ url('/projects', $project->slug) }}">{{ $project->title }}</a></li>
  </ol>
</div>

@endsection

@section('content')

<div class="articles">

		<div class="post row">
        <div class="article-header col-xs-12">
            <h2>{{ $project->title }}</h2>
        </div>

				<div class="article-content col-xs-12">
          {!! $project->content !!}
        </div>

        @if($project->image_url)
        <div class="article-image col-xs-12 text-center">
            <a class="fancybox-thumb" rel="fancybox-thumb" href="{!! asset('uploads/' . $project->image_url) !!}">
                <img src="{!! asset('uploads/' . $project->image_url) !!}">
            </a>    
        </div>

        @endif
        @foreach($images as $image)
        <div class="project-image col-xs-12 col-sm-3">
            <a class="fancybox-thumb" rel="fancybox-thumb" href="{!! asset('uploads/' . $image->file) !!}">
                <img src="{!! asset('uploads/' . $image->file) !!}">
            </a> 
		</div>
		@endforeach
        <div class="col-xs-12">
    		<button class="btn btn-primary btn-lg" onclick="history.go(-1)">Wróć</button>
        </div>
    </div> 

		
</div>

@endsection