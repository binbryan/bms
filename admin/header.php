<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div class="row">
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */

// Initialize session.
ob_start();
session_start();

// Include connection file.
require_once '..\bank-include\config.php';

// Include connection file.
require_once '..\bank-include\functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
    	<title>
            <?php
            if (isset($pageTitle)) {
                echo $pageTitle .' | Bank Management System';
            } else {
                echo 'Bank Management System';
            } ?>    
        </title>
    	<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
        <!-- Place favicon.ico in the root directory -->
        
        <!-- all css here -->
        <!-- custom css -->
        <link rel="stylesheet" href="assets/css/custom.css">
        <!-- bootstrap v3.3.7 css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- owl.carousel.2.0.0-beta.2.4 css -->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <!-- swiper.min.css -->
        <link rel="stylesheet" href="assets/css/swiper.min.css">
        <!-- font-awesome v4.6.3 css -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- flaticon.css -->
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <!-- magnific-popup.css -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!-- metisMenu.min.css -->
        <link rel="stylesheet" href="assets/css/metisMenu.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- jquery.min -->
        <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- custom jquery-->
        <script src="assets/js/custom.js"></script>
    </head>
    <body>
    	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        	
        <!-- header-area start -->
        <header class="header-area">
            <div class="header-nav">
                <span class="title-cus"><a href="index.php"> Company Name </a></span>
                
                <span class="search-bar"><input type="text" name="search" placeholder="Search" required="required" /></span>

                <span class="logout"><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></span>
            </div><!-- .header-nav -->
        </header>

        <?php
        // Include our menu file.
        include 'menu.php';
        ?>

        <!-- main -->
        <main>
            <div class="content-area">

                    <?php
                    if (!isset($pageTitle)) {
                        echo "        
                        <div class='header-info'>
                            <h1>Management System</h1>

                            <hr class='mb-4'>
                            
                            <div class='site-description'>
                                <p>Some text here</p>
                            </div><!-- .site-description -->

                            <hr class='mb-5'>
                        </div> <!-- .header-info --> ";
                    }
                    ?>

                
                <div class="container">
                    <div class="row">