<?php
$uri = $_SERVER['REQUEST_URI'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hakoopix | Concours Photo Facebook en ligne</title>

    <!-- Fonts -->
    <link href="<?php APPLICATION_PATH ?>/public/fonts/opensans.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/fonts/montserrat.css" rel="stylesheet">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="<?php APPLICATION_PATH ?>/public/css/animate.min.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/responsive.css" rel="stylesheet" media="screen and (max-width: 600px)">

    <!-- Bootstrap Core CSS -->
    <link href="<?php APPLICATION_PATH ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
    <link href="<?php APPLICATION_PATH ?>/public/css/3-col-portfolio.css" rel="stylesheet">
    <?php } ?>
   

    <!-- CSS GENERAL -->
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
    <link href="<?php APPLICATION_PATH ?>/public/css/main.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/3-col-portfolio.css" rel="stylesheet">
    <?php } ?>


    <!-- LESS -->
    <link href="<?php APPLICATION_PATH ?>/public/css/style.php" rel="stylesheet/less">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.2/less.js"></script>


    <!-- CSS VIEWS -->
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
    <link href="<?php APPLICATION_PATH ?>/public/css/main.css" rel="stylesheet">
    <?php } ?>
    <link href="<?php APPLICATION_PATH ?>/public/css/home.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/contest.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/login.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/addAdmin.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/participate.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/dashboard.css" rel="stylesheet">

    <!-- SB Admin -->
    <link href="<?php APPLICATION_PATH ?>/templates/sb-admin/css/sb-admin.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/templates/sb-admin/css/plugins/morris.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/templates/sb-admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <!-- SCRIPTS -->
    <script src="<?php APPLICATION_PATH ?>/public/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?php APPLICATION_PATH ?>/public/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<?php
$contestObj = new contestModel();

      $contestObj->getOneByActive(true);
      $idContest = $contestObj->getId();
      $color = $contestObj->getColorTheme();
      $_SESSION['color'] = $color;
      $_SESSION['idContest'] = $idContest;
      $activeContest = $contestObj->getActiveContest();
      $logo = $activeContest['logo'];
      $banner = $activeContest['banner'];
?>

<body cz-shortcut-listen="true">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">

        <!-- Navigation -->
        <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
          <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="container">
              <div class="navbar-header">
                  <a class="navbar-brand" href="/"><img alt="Logo" src="<?php echo $logo?>" id="imgLogo" width="40px" height="40px"></a>
                  <span> Facebook Contest</span>
                  <?php if(!empty($_SESSION['role'])){
                    if($_SESSION['role'] != 'admin') {
                    echo '<div class="user_participate">';
                    echo '<a href="/participate"><i class="fa fa-camera-retro"></i> Participer</a>';
                    echo '</div>';
                    }
                  }?>

              </div>

              <div class="navbar-collapse collapse">
                <?php  if(!empty($_SESSION['name'])){ ?>
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
                        <li><a href="/contest" title="Administration">Concours</a></li>
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

        <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
        <div id="footer">
          <div class="container">
          <a href="/privatePolicy" title="Private Policy">Mentions légales</a>
        </div>
        </div>
        <?php } ?>

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
