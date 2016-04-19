@extends('admin.layout')

@section('content')

<h1>Dodaj nowy Artykuł</h1>
{!! Form::model($article = new \App\Article, ['url' => 'admin/articles']) !!}

	@include('admin.articles.partials.form', ['src' => '', 'submitButtonText' => 'Dodaj Artykuł'])

{!! Form::close() !!}

@include('admin.partials.modalselect', ['img_path' => asset('uploads'), 'action' => 'admin/articles'])

@include('errors.list')

@endsection

@section('scripts')

<script type="text/javascript">
	
$(document).ready(function() {
	$(document).on("click", ".select_image", function() {
		var imagePrev = $(this).data('file');
		var imageSrc = $(this).data('path');
		$("#image_url").val(imageSrc);
		$(".show_image").attr('src', imagePrev);
	});
});

</script>

@endsection