<!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">
    <li><a href="{{ url('/') }}">Home</a></li>
    @if(Auth::check())
        <li class="dropdown dropdown-admin">
            <a href="{{ url('/admin/projects') }}" class="dropdown-toggle" aria-expanded="false">Projekty<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('admin/projects/create') }}">Nowy projekt</a></li>
            </ul>
        </li>
        <li class="dropdown dropdown-admin">
            <a href="{{ url('/admin/articles') }}" class="dropdown-toggle" aria-expanded="false">Aktualności<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('admin/articles/create') }}">Nowy artykuł</a></li>
            </ul>
        </li>
        <li class="dropdown dropdown-admin">
            <a href="{{ url('/admin/offer') }}" class="dropdown-toggle" aria-expanded="false">Oferta<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('admin/offer/create') }}">Nowa oferta</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/admin/upload') }}">Upload</a></li>
    @endif
</ul>

<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @if (Auth::guest())
        <li><a href="{{ url('/admin/login') }}">Login</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </li>
    @endif
</ul>