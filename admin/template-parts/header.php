<?php ob_start(); ?>
<?php session_start(); ?>
<?php require_once(dirname(dirname(dirname(__FILE__))) . "/includes/db.php"); ?>
<?php require_once("./functions.php"); ?>
<?php 
	if(!is_admin()) {
		header("Location: ../login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Shop Admin - Get your food now!</title>

    <!-- Bootstrap Core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="./assets/css/styles.css" rel="stylesheet">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
        <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('navigation.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">