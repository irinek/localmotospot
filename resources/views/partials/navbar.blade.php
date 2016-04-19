<!-- Left Side Of Navbar -->
<div class="nav navbar-nav">
<div class="row">

    <div class="list projects-page @if (Request::is('projects*')) active @endif">
    	<a href="{{ url('/projects') }}">Projekty</a>
    </div>

    <div class="list offer-page @if (Request::is('offer*')) active @endif">
        <a href="{{ url('/offer') }}">Oferta</a>
    </div>

    <div class="list home-page @if (Request::is('/')) active @endif">
        <a class="text-center logo-img" href="{{ url('/') }}">
            <img src="{{ asset('images/lms-logo.png') }}">
        </a>
        <a class="text-center logo-text" href="{{ url('/') }}">Home</a>
    </div>

    <div class="list articles-page @if (Request::is('articles*')) active @endif">
        <a href="{{ url('/articles') }}">Aktualności</a>
    </div>
    
    <div class="list contact-page @if (Request::is('contact*')) active @endif">
        <a href="{{ url('/contact') }}">Kontakt</a>
    </div>
</div>    
</div>