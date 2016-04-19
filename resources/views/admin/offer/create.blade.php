@extends('admin.layout')

@section('content')

<h1>Dodaj nową ofertę</h1>
{!! Form::model($offer = new \App\Offer, ['url' => 'admin/offer']) !!}

@include('admin.offer.partials.form', ['src' => '', 'submitButtonText' => 'Dodaj Ofertę'])

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