<div class="modal fade" id="modal-select" tabIndex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Wybierz jedno zdjęcie</h4>
			</div>
			<div class="modal-body">
<div class="gallery">
	@foreach($images as $image)
		<div class="image col-xs-4" style="height: 250px"> 
			<img src="{{ asset('uploads/thumbs/' . $image->file) }}" style="width: 100%">
			<button type="button" class="select_image btn btn-danger btn-md" data-id="{{ $image->id }}" data-file="{{ $img_path . '/' . $image->file }}" data-path="{{ $image->file }}" data-dismiss="modal"  style="position: absolute; left: 25px; top:10px">
			Wybierz mnie</button>
		</div>
	@endforeach

</div>
			</div>
			<div class="modal-footer">
				<form method="POST" action="{{ $action }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
				</form>
			</div>
		</div>
	</div>
</div>


