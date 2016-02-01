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
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hakoopix | Concours Photo Facebook en ligne</title>

    <!-- CSS Stylesheets -->
    <link href="<?php __ROOT__ ?>/public/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/public/css/animate.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest") { ?>
      <link href="<?php __ROOT__ ?>/public/css/3-col-portfolio.css" rel="stylesheet">
    <?php } ?>

    <!-- General Stylesheets -->
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest") { ?>
      <link href="<?php __ROOT__ ?>/public/css/main.css" rel="stylesheet">
      <link href="<?php __ROOT__ ?>/public/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php __ROOT__ ?>/public/css/3-col-portfolio.css" rel="stylesheet">
    <?php } ?>

    <!-- General Stylesheets -->
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice") { ?>
      <link href="<?php __ROOT__ ?>/public/css/main.css" rel="stylesheet">
    <?php } ?>
    <link href="<?php __ROOT__ ?>/public/css/home.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/public/css/contest.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/public/css/login.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/public/css/addAdmin.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/public/css/participate.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/public/css/dashboard.css" rel="stylesheet">

    <!-- SB Admin -->
    <link href="<?php __ROOT__ ?>/templates/sb-admin/css/sb-admin.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/templates/sb-admin/css/plugins/morris.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/templates/sb-admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="<?php __ROOT__ ?>/public/fonts/opensans.css" rel="stylesheet">
    <link href="<?php __ROOT__ ?>/public/fonts/montserrat.css" rel="stylesheet">

    <!-- SCRIPTS -->
    <script src="<?php __ROOT__ ?>/public/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="<?php __ROOT__ ?>/public/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php __ROOT__ ?>/public/js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body cz-shortcut-listen="true">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">

        <!-- Navigation -->
        <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest") { ?>
          <nav class="navbar navbar-fixed-top" role="navigation" style="background-color: #12ba74;">
            <div class="container">
              <div class="navbar-header">
                  <a class="navbar-brand" href="/">Home</a>
                  <span> Facebook Contest</span>
              </div>

              <div class="navbar-collapse collapse">
                <?php  if(!empty($_SESSION)){ ?>
                <ul class="nav navbar-nav pull-right">
                  <li><img class="user-picture-profile" src="<?php echo $_SESSION['photo'];?>"/></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><strong><?php echo $_SESSION["name"];?> </strong> <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                      <?php if($_SESSION["role"] == "admin") { ?>
                        <li><a href="/dashboard" title="Administration">Administration</a></li>
                        <hr>
                        <li><a href="../public/data/disconnect.php">Déconnexion</a></li>
                      <?php } else { ?>
                        <li><a href="/participate" title="Administration">Participer</a></li>
                        <li><a href="/participate" title="Administration">Mes photos</a></li>
                        <hr>
                        <li><a href="<?php __ROOT__ ?>/public/data/disconnect.php">Déconnexion</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                  <li><a href="<?php __ROOT__ ?>/public/data/disconnect.php"><i class="fa fa-power-off"></i></a></li>
                </ul>
                <?php } ?>
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

  <!-- SCRIPTS -->
  <script src="<?php __ROOT__ ?>/public/js/script.js" type="text/javascript"></script>
  <script src="<?php __ROOT__ ?>/public/js/functions.js" type="text/javascript"></script>
  <script src="<?php __ROOT__ ?>/public/js/jscolor.js" type="text/javascript"></script>
  <script src="<?php __ROOT__ ?>/templates/sb-admin/js/plugins/morris/raphael.min.js"></script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <!-- <script src="../templates/sb-admin/js/plugins/morris/morris.min.js"></script> -->
  <!-- <script src="../templates/sb-admin/js/plugins/morris/morris-data.js"></script> -->

</body>
</html>
