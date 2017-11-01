<!--
    resources/views/layouts/admin.blade.php
    layout de l'administration
-->

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Administration</title>
        <meta name="description" content="">

        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/mainAdmin.css') }}
        {{ Html::style('css/admin.css') }}
        <!-- nivo slider  -->
        {{ Html::style('admin/js/nivo-slider/themes/default/default.css') }}
        {{ Html::style('admin/js/nivo-slider/nivo-slider.css') }}

    </head>
    <body>
      <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->		
        <div class="wrap">
            <!-- NAVIGATION -->		
            <div id="nav"> 
                <div class="container clearfix">

                    <!-- MENU -->		
                    <div id="navigation">
                        <ul id="menu" class="menu">
                            <li >{{Html::link('/', 'Home')}}</li>
                        </ul>	

                        <div class="membres">
                            <ul>
                                <li><a href="{{URL::to('admin')}}">Administration</a></li>
                                <li><a href="{{URL::to('admin/logout')}}">Logout</a></li>

                            </ul>
                        </div>		

                    </div> <!-- #navigation -->



                </div> <!-- container -->
            </div> <!--#nav -->

            <!-- HEADER -->
            <header>
                <div class="container clearfix">

                    <div id="logo">
                        <a href="{{Url::route('home')}}" title="Home"><img  src="{{Request::root().'/img/logo.png'}}" alt="Mon blog" /></a>
                    </div>		
                </div> <!-- container -->
            </header>
            <!-- NAVIGATION -->		
            <div id="nav"> 
                <div class="container clearfix">

                    <!-- MENU -->		
                    <div id="navigation">
                        <ul id="menu" class="menu">
                            <li >{{Html::link('admin','Dashboard')}}</li>
                            <li >{{Html::link('admin/articles','Articles/Slider')}}</li>
                            <li >{{Html::link('admin/works','Works')}}</li>
                            <li >{{Html::link('admin/posts','Posts')}}</li>
                            <li >{{Html::link('admin/categories','Categories')}}</li>
                            <li >{{Html::link('admin/tags','Tags')}}</li>
                        </ul>	

                    </div> <!-- #navigation -->

                </div> <!-- container -->
            </div> <!--#nav -->
            <div class="container">
                @if(Session::has('alert_error'))
                <div class="alert_error">
                    {{Session::get('alert_error')}}
                </div>
                @endif
            </div>
            <div class="container">
                @if(Session::has('alert_success'))
                <div class="alert_success">
                    {{Session::get('alert_success')}}
                </div>
                @endif
            </div>

            @yield('contenu')

            <!-- FOOTER -->
            <footer>
                <div class=" container clearfix">
                    <p>Thème créer par athakim pour démonstration de mes formations </p>
                    <p>&copy; Athakim - 2013</p>			
                </div> 
            </footer>

        </div> 

        {{Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')}}
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>');</script>

        {{Html::script('js/bootstrap.min.js')}}

        @yield('scripts')
    </body>
</html>