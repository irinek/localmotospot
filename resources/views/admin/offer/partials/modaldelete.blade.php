<button type="button" class="open-modal-delete btn btn-danger btn-md pull-right" data-toggle="modal" data-target="#modal-delete" data-id="{{ $offer->id }}">
		<i class="fa fa-times-circle"></i>Usuń Ofertę
	</button>

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
					chcesz usunąć Ofertę?
				</p>
			</div>
			<div class="modal-footer delete-article">
				{!! Form::open(['method' => 'DELETE', 'action' => ['Admin\OfferAdminController@destroy', $offer->id]]) !!}
					<button type="button" class="btn btn-default" data-dismiss="modal">Nie</button>
					<button type="submit" class="btn btn-danger">
						<i class="fa fa-times-circle"></i> Tak
					</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>