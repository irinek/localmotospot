<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="iso-8859-2">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Local Moto Spot - @yield('title')</title>

    <link href="/css/app.css" rel="stylesheet">

    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container">

<div class="wrapp">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="tel: 790 476 740" id="call-us" class="pull-left"><span class="glyphicon glyphicon-earphone"></span>  790 476 740</a>
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">
                @include('partials.navbar')
            </div>
        </div>
    </nav>
    <!-- Header section -->
@yield('logo_home')

    <div class="page-header row text-center">
      
        <div class="col-xs-12">
            <h1>@yield('title')</h1>
        </div>
        <div class="social col-xs-12 col-sm-2 col-sm-offset-3 pull-right">
            <a id="facebook-icon" href="https://www.facebook.com/localmotospot"><img src="{{ asset('images/facebook.png') }}"></a>
        </div>
        <div class="social col-xs-12 col-sm-2 col-sm-offset-3 pull-right">
            <a id="allegro-icon" href="http://allegro.pl/listing/user/listing.php?us_id=42355576"><img src="{{ asset('images/allegro.png') }}"></a>
        </div>

            @yield('breadcrumbs')

    </div>

<!-- Body section -->
    <div class="content row">
        @include('admin.partials.flash')
        @yield('content')
    </div>

<!-- Footer section -->
    <div class="footer-section">
        <!-- Scroll to top -->
        <div class="col-xs-12 page-up text-center">
            <a href="#" class="btn" id="to-the-top"><span class="glyphicon glyphicon-chevron-up"></span></a>
        </div>
        <div class="footer-wrapp row">
                <!-- Navigation column/row-xs -->
                <div class="col-xs-12 col-sm-3">
                    <div class="footer-header1 col-xs-12">
                        <h2>Nawigacja</h2>
                    </div>
                    <div class="col-xs-12 footer-content1">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="/">Home</a></li>
                        <li role="presentation"><a href="projects">Projekty</a></li>
                        <li role="presentation"><a href="articles">Aktualności</a></li>
                        <li role="presentation"><a href="offer">Oferta</a></li>
                        <li role="presentation"><a href="contact">Kontakt</a></li>
                    </ul>
                    </div>
                </div>
                <!-- Facebook column/row-xs -->
                <div class="col-xs-12 col-sm-3">
                <!-- Facebook plugin -->
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.5";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div class="footer-header1 col-xs-12">
                        <h2>Facebook</h2>
                    </div>
                    <div class="col-xs-12 footer-content1 text-center">
                        <div class="fb-page" data-href="https://www.facebook.com/localmotospot" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/localmotospot"><a href="https://www.facebook.com/localmotospot">Local Moto Spot</a></blockquote></div></div>
                    </div>
                </div>
                <!-- Recent posts column/row-xs -->
                <div class="col-xs-12 col-sm-3">
                    <div class="footer-header1 col-xs-12">
                        <h2>Najnowsze posty</h2>
                    </div>
                    <div class="col-xs-12 footer-content1">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($recent_posts as $post)
                            <li role="presentation">{!! link_to_action('ArticleController@show', $post->title, [$post->slug]) !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Address and details column/row-xs -->
                <div class="col-xs-12 col-sm-3">
                    <div class="footer-header1 col-xs-12">
                        <h2>Local Moto Spot</h2>
                    </div>
                    <div class="col-xs-12 footer-content1">
                        <address>
                            ul. Fedkowicza 12 <br>
                            30-381 Kraków <br>
                            Tel: 790 476 740 <br>
                            workshop@localmotospot.pl
                        </address>
                    <div class="col-xs-12 logo-footer">
                        <img src="{{ asset('images/lms-logo.png') }}">
                    </div>
                    </div>
                </div>
    </div>
        <div class="copyright row">
            <div class="copy-left col-xs-12 col-sm-6">
                <p>&copy; Copyright 2016</p>
            </div>
            <div class="copy-right col-xs-12 col-sm-6">
                <p>Local Moto Spot - serwis motocyklowy i samochodowy</p>
            </div>
        </div>
</div>
</div>
</div>
    <!-- JavaScripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>


    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    @yield('scripts')

</body>
</html>
