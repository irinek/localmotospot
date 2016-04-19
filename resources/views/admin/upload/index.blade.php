@extends('admin.layout')

@section('content')

<h1>Upload</h1>
@include('errors.list')
{!! Form::open(['url' => '/admin/upload', 'id' => 'upload', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

<div class="form-group col-xs-12">
	{!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
</div>

<div class="form-group col-xs-12">
	{!! Form::submit('Upload', ['class' => 'form-control btn btn-primary']) !!}
</div>

{!! Form::close() !!}

<div class="gallery col-xs-12">
	@foreach($images as $image)
		<div class="image col-xs-12 col-sm-4" style="height: 250px"> 
			<img src="{{ asset('uploads/thumbs/' . $image->file) }}">
			<button type="button" class="open-modal btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete" data-id="{{ $image->id }}" style='position: absolute; left: 50px; top:10px'>
			<i class="fa fa-times-circle"></i>Usuń</button>
		</div>
	@endforeach

</div>

<div class="modal fade" id="modal-delete" tabIndex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Czy aby napewno</h4>
			</div>
			<div class="modal-body">
				<p class="lead">
					<i class="fa fa-question-circle fa-lg"></i> &nbsp;
					chcesz usunąć to zdjęcie?
				</p>
			</div>
			<div class="modal-footer">
				<form method="POST" action="">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="DELETE">
					<button type="button" class="btn btn-default" data-dismiss="modal">Nie</button>
					<button type="submit" class="btn btn-danger">
						<i class="fa fa-times-circle"></i> Tak
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection