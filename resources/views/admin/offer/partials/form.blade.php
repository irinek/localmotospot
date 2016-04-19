<div class="col-xs-12 form-group">
	{!! Form::label('title', 'Tytuł:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="col-xs-12 form-group">
	{!! Form::label('content', 'Treść:') !!}
	@include('tinymce::tpl')
	{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>


<?php $i = 1 ?>
<div class="col-xs-12 form-group">
	{!! Form::label('Pozycja:') !!}
@if(count($positions) > 0)
@foreach($positions as $position)
	{!! Form::radio('position', $position->position, ['class' => 'form-control']) !!}
	{!! Form::label('position', $i++) !!}
@endforeach
	{!! Form::radio('position', $position->max('position')+1, ['class' => 'form-control']) !!}
	{!! Form::label('position', '+(' . $i++ . ')') !!}
@elseif(count($positions) == 0)
	{!! Form::radio('position', 1, ['class' => 'form-control']) !!}
	{!! Form::label('position', '1') !!}
@endif

</div>

	<div class="col-xs-12 form-group">
		{!! Form::label('image_url', 'Wybierz zdjęcie') !!}
		{!! Form::hidden('image_url', null) !!}
		<button type="button" class="open-modal btn btn-danger btn-md" data-toggle="modal" data-target="#modal-select">
			Przeglądaj
		</button>
		<button type="button" class="select_image btn btn-danger btn-md" data-file="">
			Bez zdjęcia
		</button>
	</div>

	<div class="img_preview form-group">
		{!! Html::image($src, 'photo', ['class' => 'show_image']) !!}
	</div>

<div class="col-xs-12 form-group">
	{!! Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary']) !!}
</div>