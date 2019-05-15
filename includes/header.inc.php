<?php
    require "db_config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Honest Guide Subotica</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/images/apple-icon-72x72.png">
</head><!--/head-->

<body>
	<header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCGWiHMMGC-TKe7WoTmAIgfQ" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                    	<h1><img src="assets/images/logo.png" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li class="dropdown"><a href="#">Tours <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="aboutus.html">Top 5</a></li>
                                <li><a href="aboutus2.html">New tours</a></li>
                                <li><a href="service.html">Our guides</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="blog.html">Locations <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Top 5</a></li>
                                <li><a href="blogtwo.html">New locations</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="portfolio.html">Events <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="portfolio.html">Top 5</a></li>
                                <li><a href="portfoliofour.html">This week</a></li>
                                <li><a href="portfolioone.html">Coming up</a></li>
                            </ul>
                        </li>
                        <li><a href="login.php ">Login</a></li>
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->