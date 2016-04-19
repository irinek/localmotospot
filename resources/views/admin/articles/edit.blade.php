@extends('admin.layout')

@section('content')

@include('admin.articles.partials.modaldelete')

<h1>Edytuj Artykuł</h1>
{!! Form::model($article, ['method' => 'PATCH', 'url' => 'admin/articles/' . $article->slug, 'files' => 'true']) !!}
	
	@include('admin.articles.partials.form', ['src' => $article->image_url, 'submitButtonText' => 'Zapisz zmiany'])

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