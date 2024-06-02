
<!DOCTYPE html>
<html>

<head>
    <title>Watches an E-Commerce online Shopping Category Flat Bootstrap Responsive Website Template| Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--webfont-->
    <link rel="icon" type="image/x-icon" href="/assets/images/icon.ico">
    <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
    <!-- start menu -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer"   />
</head>

<!-- <div id="loader-wrapper">
	<div class="loader">
		<span class="hour"></span>
		<span class="min"></span>
		<span class="circel"></span>
	  </div>
	</div>  -->

<body>
    <div class="men_banner">
        <div class="container">
            <div class="header_top">
                <div class="header_top_left">
                    <div class="box_11"><a href="index.php?page=checkout">
                            <h4>
                                <p>Cart</p><img src="assets/images/bag.png" alt="" />
                                <div class="clearfix"> </div>
                            </h4>
                        </a></div>

                    <div class="clearfix"> </div>
                </div>
                <?php
                if(!isset($_SESSION['user'])) {
                    ?>
                <ul class="header_user_info">
                    <a class="login" href="index.php?page=login">
                        <i class="user"> </i>
                        <li class="user_desc">My Account</li>
                    </a>
                    <div class="clearfix"> </div>
                </ul>
                <?php
                }
                ?>
                <?php
                if(isset($_SESSION['user'])) {
                    ?>
                <ul class="header_user_info">
                    <a class="login" href="index.php?page=profile">
                        <i class="user"> </i>
                        <li class="user_desc">My Account</li>
                    </a>
                    <div class="clearfix"> </div>
                </ul>
                <ul class="header_user_info">
                    <a class="login" id="log" href="models/logout.php">
                        <i class="user"> </i>
                        
                        <li class="user_desc">Logout</li>
                    </a>
                    <div class="clearfix"> </div>
                </ul>
                <ul class="header_user_info">
                    <a class="login" href="index.php?page=anketa">
                        <i class="user"> </i>
                        
                        <li class="user_desc">Anketa</li>
                    </a>
                    <div class="clearfix"> </div>
                </ul>
                <?php
                }
                ?>

                <?php
                if(isset($_SESSION['user'])&& $_SESSION['user']['roleId'] == 1) {
                    ?>
                
                <ul class="header_user_info">
                    <a class="login" href="admin/indexA.php?page=dashboard">
                        <i class="user"> </i>
                        <li class="user_desc">Admin Panel</li>
                    </a>
                    <div class="clearfix"> </div>
                </ul>
                <?php
                }
                ?>



                <div class="clearfix"> </div>
            </div>
            <div class="header_bottom">
                <div class="logo">
                    <h1><a href="index.php?page=main"><span class="m_1">W</span>atches</a></h1>
                </div>
                <div class="menu">
                    <nav class="navbar">

                        <ul class="nav-menu">
                            <?php

                            dinMeni()

                            ?>
                        </ul>
                        <div class="hamburger">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                    </nav>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>