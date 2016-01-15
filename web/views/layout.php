<?php
session_start();
include("include/connexion.php");

$uri = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hakoopix | Concours Photo Facebook en ligne</title>

    <!-- CSS Stylesheets -->

    <!-- General Stylesheets -->
    <link href="../public/css/main.css" rel="stylesheet">
    <link href="../public/css/home.css" rel="stylesheet">
    <link href="../public/css/contest.css" rel="stylesheet">
    <link href="../public/css/login.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <?php if($uri != "/admin" && $uri != "/login") { ?>
      <link href="../public/css/3-col-portfolio.css" rel="stylesheet">
    <?php } ?>

    <!-- Fonts -->
    <link href="../public/fonts/opensans.css" rel="stylesheet">
    <link href="../public/fonts/montserrat.css" rel="stylesheet">

</head>
<body cz-shortcut-listen="true">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">

        <!-- Navigation -->
        <?php if($uri != "/admin" && $uri != "/login") { ?>
          <nav class="navbar navbar-fixed-top" role="navigation" style="background-color: #12ba74;">
            <div class="container">
              <div class="navbar-header">
                  <a class="navbar-brand" href="/">Logo</a>
                  <span>Facebook Contest</span>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="#">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <?php if(!empty($_SESSION)){
                          if($_SESSION["role"] == "admin") { ?>
                            <li><a href="/admin" title="Administration">Administration</a></li>
                  <?php } } ?>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
          </nav>
        <?php } ?>

		    <?php include $this->view; ?>

        <div id="footer">
          <div class="inner"></div>
        </div>

    </div><!-- /.site-wrapper-inner -->
  </div><!-- /.site-wrapper -->

</body>
</html>
