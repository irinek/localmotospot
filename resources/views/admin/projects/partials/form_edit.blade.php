<div class="form-group col-xs-12">
	{!! Form::label('title', 'Tytuł:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-xs-12">
	{!! Form::label('content', 'Treść:') !!}
	@include('tinymce::tpl')
	{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-xs-12">
	{!! Form::label('image_url', 'Wybierz zdjęcie główne') !!}
	{!! Form::hidden('image_url', null) !!}
	<button type="button" class="open-modal btn btn-danger btn-md" data-toggle="modal" data-target="#modal-select-main">
		Przeglądaj
	</button>
</div>

<div class="form-group gen_input col-xs-12">
	{!! Form::label('image_id', 'Wybierz zdjęcia') !!}
	<!-- <input class="form-control" name="image_id" type="text"> -->
	<button type="button" class="open-modal btn btn-danger btn-md" data-toggle="modal" data-target="#modal-select">
		Przeglądaj
	</button>
</div>

<div class="main-img_preview form-group col-xs-12">
	{!! Html::image($src, 'photo', ['class' => 'show_main_image col-xs-12']) !!}
</div>

	<div class="img_preview form-group col-xs-12">
	<?php $i = 0 ?>
		@foreach($proj_images as $proj_image)
		<div class='detach_group col-xs-4' data-id="{{ ++$i }}" style='height: 250px'>
				<input class='form-control' name='image_id[]' id="{{ $i }}" data-id="{{ $proj_image->id }}" type='hidden' value="{{ $proj_image->id }}">
				<img src="{{ asset('uploads/thumbs') . '/' . $proj_image->file }}" class="show_thumbs deletable" data-id="{{ $i }}" style='width: 100%'>
				<button class='dismiss_input' type='button' data-id="{{ $i }}" style='position: absolute; right: 25px; top:10px'><i class='fa fa-times-circle'></i></button>
			</div>
		@endforeach
	</div>
<div class="form-group col-xs-12">
	{!! Form::label('published_at', 'Publikuj:') !!}
	{!! Form::input('date', 'published_at', $project->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group col-xs-12">
	{!! Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary']) !!}
</div>