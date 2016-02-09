<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hakoopix | Concours Photo Facebook en ligne</title>

    <!-- CSS Stylesheets -->
    <link href="<?php APPLICATION_PATH ?>/public/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/css/animate.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
      <link href="<?php APPLICATION_PATH ?>/public/css/3-col-portfolio.css" rel="stylesheet">
    <?php } ?>

    <!-- General Stylesheets -->
    <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
      <link href="<?php APPLICATION_PATH ?>/public/css/main.css" rel="stylesheet">
      <link href="<?php APPLICATION_PATH ?>/public/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php APPLICATION_PATH ?>/public/css/3-col-portfolio.css" rel="stylesheet">
    <?php } ?>

    <!-- General Stylesheets -->
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

    <!-- Fonts -->
    <link href="<?php APPLICATION_PATH ?>/public/fonts/opensans.css" rel="stylesheet">
    <link href="<?php APPLICATION_PATH ?>/public/fonts/montserrat.css" rel="stylesheet">

    <!-- SCRIPTS -->
    <script src="<?php APPLICATION_PATH ?>/public/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="<?php APPLICATION_PATH ?>/public/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php APPLICATION_PATH ?>/public/js/bootstrap.min.js" type="text/javascript"></script>
</head>