<!DOCTYPE html>
<html lang="es" id="extr-page">
<head>
    <meta charset="utf-8">
    <title> SIAD Federios</title>
    <meta name="description" content="Sistema Integrado de Administracion Deportiva">
    <meta name="author" content="Ing. Diego Suarez <dasmania03@gmail.com>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- #CSS Links -->
    <!-- Basic Styles -->
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    {!! Html::style('css/smartadmin-production-plugins.min.css') !!}
    {!! Html::style('css/smartadmin-production.min.css') !!}
    {!! Html::style('css/smartadmin-skins.min.css') !!}

    <!-- "your_style.css" -->
    {!! Html::style('css/web.css') !!}

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{ url('img/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('img/favicon/favicon.png') }}" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
</head>

<body class="animated fadeInDown">
<header id="header">
    <div id="logo-group">
        <span id="logo"> <img src="{{ url('img/logo.png') }}" alt="SIAD Federios"> </span>
    </div>
    @yield("header")
</header>

<div id="main" role="main">
    <!-- MAIN CONTENT -->
    <div id="content" class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                <ul class="rslides">
                    <li><img src="{{ url('img/slider/slider-1.jpg') }}"></li>
                    <li><img src="{{ url('img/slider/slider-2.jpg') }}"></li>
                    <li><img src="{{ url('img/slider/slider-3.jpg') }}"></li>
                    <li><img src="{{ url('img/slider/slider-4.jpg') }}"></li>
                    <li><img src="{{ url('img/slider/slider-5.jpg') }}"></li>
                    <li><img src="{{ url('img/slider/slider-6.jpg') }}"></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>
</div>

<!--================================================== -->
<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');} </script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

<!-- BOOTSTRAP JS -->
{!! Html::script('js/bootstrap/bootstrap.min.js') !!}

<!-- JQUERY VALIDATE -->
{!! Html::script('js/plugin/jquery-validate/jquery.validate.min.js') !!}

<!-- JQUERY MASKED INPUT -->
{!! Html::script('js/plugin/masked-input/jquery.maskedinput.min.js') !!}

{!! Html::script('js/plugin/responsiveslides/responsiveslides.min.js') !!}

<script type="text/javascript">
    $(".rslides").responsiveSlides({
        speed: 800,
        random: true
    });
</script>
</body>
</html>