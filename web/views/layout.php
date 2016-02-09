<?php

$uri = $_SERVER['REQUEST_URI'];

include_once("./include/head.php");

?>

<body cz-shortcut-listen="true">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">

        <!-- Navigation -->
        <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
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
