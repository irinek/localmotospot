@extends('layout')

@section('title', 'Kontakt')

@section('breadcrumbs')

<div class="breadcrumb-container col-xs-12 col-sm-8 pull-left">
  <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active"><a href="/contact">Kontakt</a></li>
  </ol>
</div>

@endsection

@section('content')


<div class="articles">
<div class="post row">
    <div class="article-header col-xs-12">
        <h2>Local Moto Spot</h2>
    </div>
    <div class="article-content col-xs-12">
        <address>
            <p>ul. Fedkowicza 12</p>
            <p>30-381 Kraków</p>
            <p>Tel: 790 476 740</p>
            <p>workshop@localmotospot.pl</p>
        </address>
    </div>
</div>
</div>

<div class="map row">
	<div class="map-header text-center">
		<h2>Dojazd</h2>
	</div>
	@include('partials.gmap')
</div>

<div class="articles">
<div class="post row contact-form">
	<div class="article-header col-xs-12">
		<h2>Skontaktuj się z nami</h2>
	</div>
	<div class="article-content col-xs-12">
		<p>Zadzwoń pod numerem telefonu: 790 476 740 lub wypełnij formularz:</p>
	</div>

<div class="article-content col-xs-12">
@include('errors.list')
	{!! Form::open(['action' => 'ContactController@send', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

	<div class="form-group col-xs-12">
		{!! Form::label('name', 'Imię i nazwisko*') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-xs-12">
		{!! Form::label('email', 'Twój e-mail*') !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-xs-12">
		{!! Form::label('phone', 'Telefon kontaktowy') !!}
		{!! Form::tel('phone', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-xs-12">
		{!! Form::label('subject', 'Temat*') !!}
		{!! Form::text('subject', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-xs-12">
		{!! Form::label('message', 'Wiadomość*') !!}
		{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-xs-12">
		{!! Form::label('attachement', 'Załącznik') !!}
		{!! Form::file('attachement') !!}
	</div>

	<div class="form-group text-center col-xs-12">
		{!! Form::submit('Wyślij', ['class' => 'form-control btn btn-primary']) !!}
	</div>
	{!! Form::close() !!}
</div>
</div>
</div>
@endsection

