<?php
// this page made by feras 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="manage_admin.php">Dashboard</a>
                                </li>
                                <!-- <li>
                                    <a href="manageAdmin.php">Manage Admin</a>
                                </li>
                                <li>
                                    <a href="manageCategory.php">Manage Category</a>
                                </li>
                                <li>
                                    <a href="manageProducts.php">Manage Products</a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>  Dashboard</a>
                        </li>
                        <li>
                            <a href="../index.php">
                            <i class="fas fa-home"></i>  Back To Home Page</a>
                        </li>
                        <?php
                        include('connection.php');
                        if (isset($_SESSION['superadmin'])) {
                            echo "<li class='has-sub'>";
                            echo "<a class='js-arrow' href='manage_admin.php'>";
                            echo "<i class='fa fa-user'></i>Manage Admin</a>";
                            echo "</li>";
                        } elseif (isset($_SESSION['admin'])) {
                            echo "<li>";
                            echo "Admin";
                            echo "</li>";
                        }
                        ?>
                        <li>
                            <a href="manage_customer.php">
                                <i class="fa fa-group"></i>Manage Customer</a>
                        </li>
                        <li>
                            <a href="manage_category.php">
                                <i class="fas fa-chart-bar"></i>Manage Category</a>
                        </li>
                        <li>
                            <a href="manage_products.php">
                                <i class="fa fa-inbox"></i>Manage Product</a>
                        </li>

                        <li>
                            <a href="manage_order.php">
                                <i class="fa fa-credit-card"></i>Manage Order</a>
                        </li>
                        <!-- <li>
                            <a href="manage_products.php">
                                <i class="fas fa-chart-bar"></i>manageProducts</a>
                        </li> -->


                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">

                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">

                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <!-- <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div> -->
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Welcome <?php
                                            if(isset($_SESSION['superadmin'])){
                                                echo $_SESSION['superadmin']; 
                                            } elseif(isset($_SESSION['admin'])){
                                                echo $_SESSION['admin']; 
                                            }
                                            
                                            ?> </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                        
                                            <div class="account-dropdown__footer">
                                                <a href="../logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->