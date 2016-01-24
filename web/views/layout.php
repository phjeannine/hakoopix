<?php

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
    <!-- Bootstrap Core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList") { ?>
      <link href="../public/css/3-col-portfolio.css" rel="stylesheet">
    <?php } ?>

    <!-- General Stylesheets -->
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList") { ?>
      <link href="../public/css/main.css" rel="stylesheet">
    <?php } ?>
    <link href="../public/css/home.css" rel="stylesheet">
    <link href="../public/css/contest.css" rel="stylesheet">
    <link href="../public/css/login.css" rel="stylesheet">
    <link href="../public/css/addAdmin.css" rel="stylesheet">
    <link href="../public/css/participate.css" rel="stylesheet">
    <link href="../public/css/dashboard.css" rel="stylesheet">

    <link href="../public/css/animate.min.css" rel="stylesheet">

    <!-- SB Admin -->
    <link href="../templates/sb-admin/css/sb-admin.css" rel="stylesheet">
    <link href="../templates/sb-admin/css/plugins/morris.css" rel="stylesheet">
    <link href="../templates/sb-admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="../public/fonts/opensans.css" rel="stylesheet">
    <link href="../public/fonts/montserrat.css" rel="stylesheet">

    <!-- SCRIPTS -->
    <script src="../public/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="../public/js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body cz-shortcut-listen="true">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">

        <!-- Navigation -->
        <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList") { ?>
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
                 
                  <li class="dropdown"> 
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      <?php  session_start(); 
                      if(!empty($_SESSION)){ ?>
                        <img class='imgUser' src="<?php echo $_SESSION['photo'];?>"/> 
                    </a>
                    <ul class="dropdown-menu">
                      <li class="nameUsr"> <?php echo $_SESSION["name"];?> </li><hr>
                      <?php if($_SESSION["role"] == "admin") { ?>
                            <li><a href="/dashboard" title="Administration">Administration </a></li>
                      <?php } } ?>
                      <li class="deconnect"><a href="deconnxion.php" title="Administration">Deconnexion </a></li>
                    </ul>
                  </li>
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

  <!-- SCRIPTS -->
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="../public/js/script.js" type="text/javascript"></script>
  <script src="../public/js/jscolor.js" type="text/javascript"></script>
  <script src="../templates/sb-admin/js/plugins/morris/raphael.min.js"></script>
  <!-- <script src="../templates/sb-admin/js/plugins/morris/morris.min.js"></script> -->
  <!-- <script src="../templates/sb-admin/js/plugins/morris/morris-data.js"></script> -->

</body>
</html>
