<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="iso-8859-2">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Local Moto Spot Admin</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <link href="/css/admin-app.css" rel="stylesheet">

     <script src="{{ asset('vendor/js/tinymce/tinymce.min.js') }}"></script>

</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('#') }}">
                    Local Moto Spot Admin
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">
                @include('admin.partials.navbar')
            </div>
        </div>
    </nav>

    <div class="container">
    @include('admin.partials.flash')

    @yield('content')

    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/admin-app.js"></script>

    @yield('scripts')

</body>
</html>
