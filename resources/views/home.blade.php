<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sistema Integrado de Administracion Deportiva">
    <meta name="author" content="Ing. Diego Suarez <dasmania03@gmail.com>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- #CSS Links -->
    <!-- Basic Styles -->
{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/font-awesome.min.css') !!}

<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
{!! Html::style('css/smartadmin-production-plugins.min.css') !!}
{!! Html::style('css/smartadmin-production.min.css') !!}
{!! Html::style('css/smartadmin-skins.min.css') !!}

<!-- Mis Estilos -->
{!! Html::style('css/app.css') !!}

<!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{ url('img/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('img/favicon/favicon.png') }}" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="fixed-header fixed-navigation">
<!-- #HEADER -->
<header id="header">
    <div id="logo-group">
        @include('layouts.logo')
        @include('layouts.notification')
    </div>

    <!-- #TOGGLE LAYOUT BUTTONS -->
    <!-- pulled right: nav area -->
    <div class="pull-right">
    @include('layouts.toggleMenu')
    <!-- #MOBILE -->
        @include('layouts.logoutButton')
        @include('layouts.searchField')
        @include('layouts.fullscreenButton')
    </div>
    <!-- end pulled right: nav area -->
</header>
<!-- END HEADER -->

<!-- #NAVIGATION -->
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
<aside id="left-panel">

@include('layouts.userInfo')

<!-- NAVIGATION : This navigation is also responsive
        To make this navigation dynamic please make sure to link the node
        (the reference to the nav > ul) after page load. Or the navigation
        will not initialize.
        -->
    <nav>
        <!--
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->
        <ul>
            <li class="">
                <a href="/dashboard-cv2017" title="blank_"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Escritorio</span></a>
            </li>
            <li class="">
                <a href="#" title="Cursos Vacacionales"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Vacacionales 2017</span></a>
                <ul>
                    <li class="">
                        <a href="/ficha"><span class="menu-item-parent">Nueva Ficha Única</span></a>
                    </li>
                    <li class="">
                        <a href="/inscripciones"><span class="menu-item-parent">Inscripciones</span></a>
                    </li>
                    <li class="">
                        <a href="/products"><i class="fa fa-fw fa-tags"></i> Productos</a>
                    </li>
                    @if (Auth::user()->role != 'register')
                        <li class="">
                            <a href="#"><i class="fa fa-fw fa-bar-chart"></i> Reportes</a>
                            <ul>
                                <li class="">
                                    <a href="/summary"><i class="fa fa-fw fa-pie-chart"></i> Resumen</a>
                                </li>
                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'cashier')
                                    <li>
                                        <a href="/ventas"><i class="fa fa-fw fa-line-chart"></i> Ventas</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="/active-inscription"><i class="fa fa-fw fa-vcard"></i> Inscripciones Activas</a>
                                </li>
                                <li class="">
                                    <a href="/delivery-uniform"><i class="fa fa-fw fa-user-o"></i> Uniformes</a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="#"><i class="fa fa-fw fa-cog"></i> Configuraciones</a>
                            <ul>
                                @if (Auth::user()->role == 'admin')
                                    <li>
                                        <a href="/codes"><i class="fa fa-fw fa-barcode"></i> Codigos</a>
                                    </li>
                                @endif
                            </ul>
                    @endif
                </ul>
            </li>
            @if (Auth::user()->role == 'admin')
                <li>
                    <a href="/user" title="Usuarios"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Usuarios</span></a>
                </li>
            @endif
        </ul>
    </nav>
</aside>
<!-- END NAVIGATION -->

<!-- #MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <!-- This is auto generated -->
        </ol>
        <!-- end breadcrumb -->

        <!-- You can also add more buttons to the
        ribbon for further usability

        Example below:

        <span class="ribbon-button-alignment pull-right" style="margin-right:25px">
            <a href="#" id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa fa-grid"></i> Change Grid</a>
            <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa fa-plus"></i> Add</span>
            <button id="search" class="btn btn-ribbon" data-title="search"><i class="fa fa-search"></i> <span class="hidden-mobile">Search</span></button>
        </span>-->

        @yield('ribbon')
    </div>
    <!-- END RIBBON -->

    <!-- #MAIN CONTENT -->
    <div id="content">
        @yield('content')
    </div>
    <!-- END #MAIN CONTENT -->

</div>
<!-- END #MAIN PANEL -->

<!-- #PAGE FOOTER -->
<div class="page-footer">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white">SIAD Federios v1.0.1 <span class="hidden-xs"> - Aplicación Web</span> © 2017</span>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- END FOOTER -->

<!-- #SHORTCUT AREA : With large tiles (activated via clicking user name tag)
     Note: These tiles are completely responsive, you can add as many as you like -->
@include('layouts.shortcut')
<!-- END SHORTCUT AREA -->

<!--================================================== -->
<!-- PACE LOADER - turn this on if you want ajax loading to
 show (caution: uses lots of memory on iDevices)
<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

<!-- #PLUGINS -->
<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>-->
{!! Html::script('js/libs/jquery-2.1.1.min.js') !!}
{!! Html::script('js/libs/jquery-ui-1.10.3.min.js') !!}

<!-- IMPORTANT: APP CONFIG -->
{!! Html::script('js/app.config.js') !!}

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
{!! Html::script('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') !!}

<!-- BOOTSTRAP JS -->
{!! Html::script('js/bootstrap/bootstrap.min.js') !!}

<!-- CUSTOM NOTIFICATION -->
{!! Html::script('js/notification/SmartNotification.min.js') !!}

<!-- JARVIS WIDGETS -->
{!! Html::script('js/smartwidgets/jarvis.widget.min.js') !!}

<!-- EASY PIE CHARTS -->
{!! Html::script('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') !!}

<!-- SPARKLINES -->
{!! Html::script('js/plugin/sparkline/jquery.sparkline.min.js') !!}

<!-- JQUERY VALIDATE -->
{!! Html::script('js/plugin/jquery-validate/jquery.validate.js') !!}

<!-- JQUERY MASKED INPUT -->
{!! Html::script('js/plugin/masked-input/jquery.maskedinput.min.js') !!}

<!-- JQUERY SELECT2 INPUT -->
{!! Html::script('js/plugin/select2/select2.min.js') !!}

<!-- JQUERY UI + Bootstrap Slider -->
{!! Html::script('js/plugin/bootstrap-slider/bootstrap-slider.min.js') !!}

<!-- browser msie issue fix -->
{!! Html::script('js/plugin/msie-fix/jquery.mb.browser.min.js') !!}

<!-- FastClick: For mobile devices: you can disable this in app.js -->
{!! Html::script('js/plugin/fastclick/fastclick.min.js') !!}

<!-- Moment JS -->
{!! Html::script('js/plugin/moment/moment.min.js') !!}

    <!--[if IE 8]>
<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
<![endif]-->

<!-- SIAD SCRIPT JS FILE -->
{!! Html::script('js/siad.script.js') !!}

<!-- MAIN APP JS FILE -->
{!! Html::script('js/app.min.js') !!}

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
{!! Html::script('js/speech/voicecommand.min.js') !!}

<!-- SmartChat UI : plugin -->
{!! Html::script('js/smart-chat-ui/smart.chat.ui.min.js') !!}
{!! Html::script('js/smart-chat-ui/smart.chat.manager.min.js') !!}

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

@yield('script')
</body>
</html>
