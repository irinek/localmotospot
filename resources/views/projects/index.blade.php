@extends('layout')

@section('title', 'Projekty')

@section('breadcrumbs')

<div class="breadcrumb-container col-xs-12 col-sm-8 pull-left">
  <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active"><a href="/projects">Projekty</a></li>
  </ol>
</div>

@endsection

@section('content')

<div class="articles endless-pagination">
<div class="post">
	@foreach ($projects as $project)

		<div class="row">
     	<div class="article-header col-xs-12">
    		<a href="{{ url('/projects', $project->slug) }}">
          <h2>{{ $project->title }}</h2>
        </a>
      </div>

			<div class="article-content col-xs-12">
        {!! 
        \Illuminate\Support\Str::words($project->content, 100,'...') !!}
        <br>
      </div>
      <div class="read-more col-xs-12">
       <a class="btn btn-primary btn-lg" href="{{ url('/projects', $project->slug) }}">Więcej<span class="glyphicon glyphicon-chevron-right"></span></a>
     </div>
    @if($project->image_url)
    <div class="article-image col-xs-12 text-center">
      <img src="{!! asset('uploads/' . $project->image_url) !!}">
    </div>
    @endif
    </div>
    <hr class="sexyline2"/>
  @endforeach
  </div>
</div>

@endsection