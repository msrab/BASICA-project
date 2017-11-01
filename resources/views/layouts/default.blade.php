<!--
    resources/views/layouts/default.blade.php
    template du site
-->

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>BASICA! A Free Bootstrap3 HTML5 CSS3 Template by Vactual Art</title>

            <!-- Bootstrap Core CSS -->
            {{Html::style('css/bootstrap.css')}}

            <!-- Custom CSS -->
            {{Html::style('css/main.css')}}
            {{Html::style('css/custom.css')}}

            {{Html::script('http://use.edgefonts.net/bebas-neue.js')}}

            <!-- Custom Fonts & Icons -->
            {{Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800')}}
            {{Html::style('css/icomoon-social.css')}}
            {{Html::style('css/font-awesome.min.css')}}

            {{Html::script('js/modernizr-2.6.2-respond-1.1.0.min.js')}}

            @yield('style')

        </head>

        <body>
            <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->


            <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{Request::root().'/img/logo.png'}}" alt="Basica"></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
                            <li><a href="{{URL::to('works')}}">Portfolio</a></li>
                            <li><a href="{{URL::to('posts')}}">Blog</a></li>
                            <li><a href="{{URL::to('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </header><!--/header-->

            @yield('contenu')

            <!-- Footer -->
            <div class="footer">
                <div class="container">

                    <div class="row">

                        <div class="col-footer col-md-4 col-xs-6">
                            <h3>Contact Us</h3>
                            <p class="contact-us-details">
                                <b>Address:</b> 123 Downtown Avenue, Manhattan, New York, United States of America<br/>
                                <b>Phone:</b> +1 123 45678910<br/>
                                <b>Fax:</b> +1 123 45678910<br/>
                                <b>Email:</b> <a href="mailto:info@yourcompanydomain.com">info@yourcompanydomain.com</a>
                            </p>
                        </div>
                        <div class="col-footer col-md-4 col-xs-6">
                            <h3>Our Social Networks</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam.</p>
                            <div>
                                <img src="img/icons/facebook.png" width="32" alt="Facebook">
                                <img src="img/icons/twitter.png" width="32" alt="Twitter">
                                <img src="img/icons/linkedin.png" width="32" alt="LinkedIn">
                                <img src="img/icons/rss.png" width="32" alt="RSS Feed">
                            </div>
                        </div>
                        <div class="col-footer col-md-4 col-xs-6">
                            <h3>About Our Company</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-copyright">&copy; 2014 <a href="http://www.vactualart.com/portfolio-item/basica-a-free-html5-template/">Basica</a> Bootstrap HTML Template. By <a href="http://www.vactualart.com">Vactual Art</a>.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Javascripts -->
            <!--<script src="js/jquery-1.9.1.min.js"><\/script>-->
            {{Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')}}
            <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>');</script>

            {{Html::script('js/bootstrap.min.js')}}

            <!-- Scrolling Nav JavaScript -->
            {{Html::script('js/jquery.easing.min.js')}}
            {{Html::script('js/scrolling-nav.js')}}

            @yield('script')
        </body>
    </html>
