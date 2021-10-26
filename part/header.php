<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sentinelle</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Favicon
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/cible.png">
    <link rel="icon" type="assets/image/png" sizes="16x16" href="assets/img/cible.png">

    <!-- Stylesheets
    ================================================== -->
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php
    if (isset($_SESSION['msg-flash']) && !empty($_SESSION['msg-flash'])) {
        echo '<div class="alert alert-' . $_SESSION['msg-flash']['type'] . '" role="alert">' . $_SESSION['msg-flash']['msg'] . '
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
        $_SESSION['msg-flash'] = [];
    }
    ?>
    <header id="masthead" class="site-header" data-anchor-target=".hero" data-top="background: rgba(255,255,255,0); padding: 30px 0; box-shadow: 0px 0px 20px 6px rgba(0, 0, 0, 0);" data-top-bottom="background: rgba(255,255,255,1); padding: 10px 0; box-shadow: 0px 0px 20px 6px rgba(0, 0, 0, 0.2);">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">
                <div class="navbar-header page-scroll">

                    <button type="button" class="navbar-toggle collapsed" data-target="#portfolio-perfect-collapse" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="#hero" class="site-logo"><img src="assets/img/logo_sentinelle.png" alt="logo"></a>

                </div><!-- /.navbar-header -->

                <div class="main-menu" id="portfolio-perfect-collapse">

                    <ul class="nav navbar-nav navbar-right">

                        <li class="page-scroll"><a href="index.php">Accueil</a></li>
                        <li class="page-scroll"><a href="#about">Portrait</a></li>
                        <li class="page-scroll"><a href="#service">Objectifs</a></li>
                        <li class="page-scroll"><a href="#portfolio">Portfolio</a></li>
                        <li class="page-scroll"><a href="#contact">Contactez Moi</a></li>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li class="page-scroll"><a href="/deconnexion.php">Déconnexion</a></li>
                        <?php } else { ?>
                            <li class="page-scroll"><a href="/login.php">Se connecter/ S'incrire</a></li>
                        <?php } ?>

                    </ul><!-- /.navbar-nav -->

                </div><!-- /.navbar-collapse -->

            </div>
        </nav><!-- /.primary-navigation -->
    </header><!-- /#header -->