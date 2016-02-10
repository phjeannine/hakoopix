<?php

$uri = $_SERVER['REQUEST_URI'];

require("/../include/head.php");

$contestObj = new contestModel();

      $contestObj->getOneByActive(true);
      $color = $contestObj->getColorTheme();
      $_SESSION['color'] = $color;
?>
    <!-- General Stylesheets
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
      <link href="<?php APPLICATION_PATH ?>/public/css/main.css" rel="stylesheet">
    <?php } ?>
    <link href="<?php APPLICATION_PATH ?>/public/css/home.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/contest.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/login.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/addAdmin.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/participate.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/dashboard.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/style.css" rel="stylesheet">

    <link href="<?php APPLICATION_PATH ?>/templates/sb-admin/css/sb-admin.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/templates/sb-admin/css/plugins/morris.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/templates/sb-admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php APPLICATION_PATH ?>/public/fonts/opensans.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/fonts/montserrat.css" rel="stylesheet">

    <script src="<?php APPLICATION_PATH ?>/public/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="<?php APPLICATION_PATH ?>/public/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php APPLICATION_PATH ?>/public/js/bootstrap.min.js" type="text/javascript"></script>
  -->

<body cz-shortcut-listen="true">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">

        <!-- Navigation -->
        <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
          <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="container">
              <div class="navbar-header">
                  <a class="navbar-brand" href="/">Home</a>
                  <span> Facebook Contest</span>
                  <?php if(!empty($_SESSION)){
                    echo '<div class="user_participate">';
                    echo '<a href="/participate">Participer</a>';
                    echo '</div>';
                  }?>

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
                        <li><a href="<?php APPLICATION_PATH ?>/public/data/disconnect.php">Déconnexion</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                  <li><a href="<?php APPLICATION_PATH ?>/public/data/disconnect.php"><i class="fa fa-power-off"></i></a></li>
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
  <script src="<?php APPLICATION_PATH ?>/public/js/script.js" type="text/javascript"></script>
  <script src="<?php APPLICATION_PATH ?>/public/js/functions.js" type="text/javascript"></script>
  <script src="<?php APPLICATION_PATH ?>/public/js/jscolor.js" type="text/javascript"></script>
  <script src="<?php APPLICATION_PATH ?>/templates/sb-admin/js/plugins/morris/raphael.min.js"></script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <!-- <script src="../templates/sb-admin/js/plugins/morris/morris.min.js"></script> -->
  <!-- <script src="../templates/sb-admin/js/plugins/morris/morris-data.js"></script> -->

</body>
</html>
