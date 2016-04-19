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
	<button type="button" class="open-modal btn btn-danger btn-md" data-toggle="modal" data-target="#modal-select">
		Przeglądaj
	</button>
</div>

	<div class="main_img_preview form-group col-xs-12">
		{!! Html::image($src, 'photo', ['class' => 'show_main_image col-xs-12']) !!}
	</div>

	<div class="img_preview form-group col-xs-12">
	
	</div>

<div class="form-group col-xs-12">
	{!! Form::label('published_at', 'Publikuj:') !!}
	{!! Form::input('date', 'published_at', $project->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group col-xs-12">
	{!! Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary']) !!}
</div>