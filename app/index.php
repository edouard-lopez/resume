<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>cv</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- build:css(.tmp) styles/main.css -->
        <link rel="stylesheet" href="styles/main.css">
        <!-- endbuild -->
        <!-- build:js scripts/vendor/bootstrap.min.js -->
        <script src="bower_components/sass-bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- endbuild -->
    </head>
    <body>
        <!--[if lt IE 10]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

                <?php require_once 'navbar.php'; ?>
        <div class="container">
            <div class="header">

                <!-- <ul class="nav nav-pills pull-right">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <h3 class="text-muted">cv</h3> -->
            </div>

            <?php require_once 'main.php'; ?>
<!--             <div class="jumbotron">
                <h1>'Allo, 'Allo!</h1>
                <p class="lead">Always a pleasure scaffolding your apps.</p>
                <p><a class="btn btn-lg btn-success" href="#">Splendid!</a></p>
            </div>

            <div class="row marketing">
                <div class="col-lg-6">
                    <h4>HTML5 Boilerplate</h4>
                    <p>HTML5 Boilerplate is a professional front-end template for building fast, robust, and adaptable web apps or sites.</p>

                    <h4>Bootstrap</h4>
                    <p>Sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.</p>

                    <h4>Modernizr</h4>
                    <p>Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.</p>


                    <h4>RequireJS</h4>
                    <p>RequireJS is a JavaScript file and module loader. It is optimized for in-browser use, but it can be used in other JavaScript environments, like Rhino and Node.</p>

                </div>
            </div> -->

            <div class="footer">
                <?php require_once 'footer.html'; ?>
                <!-- <p>♥ from the Yeoman team</p> -->
            </div>

        </div>


        <!-- build:js scripts/vendor.js -->
        <!-- bower:js -->
        <script src="bower_components/jquery/jquery.js"></script>
        <!-- endbower -->
        <!-- endbuild -->

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>

        <!-- build:js scripts/main.js -->
        <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
        <!-- endbuild -->
</body>
</html>
