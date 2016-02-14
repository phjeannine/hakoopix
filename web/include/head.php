
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