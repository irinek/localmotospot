@extends('admin.layout')

@section('content')

@include('admin.offer.partials.modaldelete')

<h1>Edytuj Artykuł</h1>
{!! Form::model($offer, ['method' => 'PATCH', 'url' => 'admin/offer/' . $offer->slug]) !!}
	
	@include('admin.offer.partials.form', ['src' => $offer->image_url, 'submitButtonText' => 'Zapisz zmiany'])

{!! Form::close() !!}


@include('admin.partials.modalselect', ['img_path' => asset('uploads/thumbs'), 'action' => 'admin/offer'])

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