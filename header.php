<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.png">
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>EPSTEMPCO</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="assets/css/mont.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar sidebar-2" data-image="assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        <img src="assets/img/logo3.png" width="100" height="100">
                    </a>
                </div>
                <ul class="nav">
                    <?php
                    if($_COOKIE["access_level"] == "0"){
                        ?>
                        <li>
                            <a class="nav-link" href="dashboard.php">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="applicants.php">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>Members Profile</p>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="maintenance.php">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>Maintenance</p>
                            </a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li>
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

        <?php

        require("nav.php");

        ?>
