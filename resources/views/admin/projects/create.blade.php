@extends('admin.layout')

@section('content')

<h1>Dodaj nowy Projekt</h1>
{!! Form::model($project = new \App\Project, ['url' => 'admin/projects']) !!}

	@include('admin.projects.partials.form', ['src' => '', 'submitButtonText' => 'Dodaj Projekt'])

{!! Form::close() !!}

@include('admin.projects.partials.modalselectmain', ['img_path' => asset('uploads'), 'action' => 'admin/projects'])
@include('admin.partials.modalselect', ['img_path' => asset('uploads'), 'action' => 'admin/projects'])

@include('errors.list')

@endsection

@section('scripts')

<script type="text/javascript">

var i = 1;
$(document).on("click", ".select_image", function() {
	var imageSrc = $(this).data('file');
	var imageId = $(this).data('id');

	$(".gen_input").prepend("<input class='form-control' name='image_id[]' id=" + i + " type='hidden'>")
	$('input[id="' + i + '"]').val(imageId);

	$(".show_image").attr('src', imageSrc);
	$(".img_preview").prepend("<div class='detach_group col-xs-4' data-id='" + i + "' style='height: 250px'><img src='" + imageSrc + "' class='show_thumbs deletable' data-id='" + i +"' style='width: 100%'>"
														+ "<button class='dismiss_input' type='button' data-id='" + i +"' style='position: absolute; right: 25px; top:10px'><i class='fa fa-times-circle'></i></button></div>");
	i++;
});

$(document).on("click", ".dismiss_input", function() {
	var dataId = $(this).data('id');
	$("input[id='" + dataId + "']").detach();
	$(".detach_group[data-id=" + dataId +"]").detach();
});

$(document).on("click", ".select_main_image", function() {
	var imagePrev = $(this).data('file');
	var imageSrc = $(this).data('path');
	$("#image_url").val(imageSrc);
	$(".show_main_image").attr('src', imagePrev);
});

</script>

@endsection