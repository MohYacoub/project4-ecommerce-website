<?php

include_once './admin/partials/connection.php';
$pageurl = $_SERVER["REQUEST_URI"];
$_SESSION['page'] = $pageurl;
?>

<body class="home">
    <header class="header style7">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <div class="header-message">
                        Welcome to TOYZEE store!
                    </div>
                </div>
                <div class="top-bar-right">

                    <ul class="header-user-links">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo "<li><a><i class='fa fa-user'></i>Welcome  {$_SESSION['user']} </a><span>||  </span>";
                            echo "<a href='logout.php'><i class='fa fa-sign-out'></i></i>Logout</a></li>";
                        } elseif (isset($_SESSION['superadmin'])) {
                            echo "<li><a><i class='fa fa-user'></i>Welcome  {$_SESSION['superadmin']} </a><span>||  </span>";
                            echo "<a href='./admin/index.php'><i class='fa fa-tachometer'></i>Dashboard</a><span>  ||  </span>";
                            echo "<a href='./logout.php'><i class='fa fa-sign-out'></i>Logout</a></li>";
                        } elseif (isset($_SESSION['admin'])) {
                            echo "<li><a><i class='fa fa-user'></i>Welcome  {$_SESSION['admin']} </a><span>||  </span>";
                            echo "<a href='admin/index.php'><i class='fa fa-tachometer'></i>Dashboard</a><span>  ||  </span>";
                            echo "<a href='./logout.php'><i class='fa fa-sign-out'></i>Logout</a></li>";
                        } else {
                            echo "<li>";
                            echo "<a href='login.php'>Login</a>
                        <span>||</span>
                        <a href='Register.php'>Register</a>";
                            echo "</li>";
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-header">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                        <div class="logo">
                            <a href="index.php">
                                <img src="assets/images/logo.png" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                        <div class="block-search-block">
                            <form class="form-search form-search-width-category">
                                <div class="form-content">
                                    <!-- <div class="category">
                                        <select title="cate" data-placeholder="All Categories" class="chosen-select" tabindex="1">

                                            <?php
                                            $queryallcat = "SELECT * FROM categories ";
                                            $resultallcat = mysqli_query($conn, $queryallcat);
                                            while ($cat_all = mysqli_fetch_assoc($resultallcat)) {
                                            ?>

                                                <option value="<?php echo "{$cat_all['cat_id']}"; ?>"><?php echo "{$cat_all['cat_name']}"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> -->
                                    <div class="inner">
                                        <input type="text" class="input" name="s" value="" placeholder="Search here">
                                    </div>
                                    <button class="btn-search" type="submit">
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                        <div class="header-control">
                            <div class="block-minicart moorabi-mini-cart block-header moorabi-dropdown">
                                <a href="javascript:void(0);" class="shopcart-icon" data-moorabi="moorabi-dropdown">
                                    Cart
                                    <span class="count">

                                        <?php
                                        $countcart = 0;
                                        if (isset($_SESSION["cart"])) {
                                            $array = $_SESSION["cart"];
                                            foreach ($array as $k) {
                                                $countcart =  count($array);
                                            }

                                            echo $countcart;
                                        } else {
                                            echo $countcart;
                                        }
                                        ?>

                                    </span>
                                </a>
                                <div class="shopcart-description moorabi-submenu">
                                    <div class="content-wrap">
                                        <h3 class="title">Shopping Cart</h3>
                                        <ul class="minicart-items">


                                            <?php
                                            if (isset($_SESSION["cart"])) {
                                                $cartarr = $_SESSION["cart"];
                                                foreach ($cartarr as $key => $value) {
                                            ?>

                                                    <li class="product-cart mini_cart_item">
                                                        <a href="#" class="product-media">
                                                            <img src="<?php echo "admin/{$value['product_image']}" ?>" alt="img">
                                                        </a>
                                                        <div class="product-details">
                                                            <h5 class="product-name">
                                                                <a href="#"><?php echo "{$value['product_name']}" ?></a>
                                                            </h5>
                                                            <span class="product-price">
                                                                <span class="price">
                                                                    <span><?php echo "{$value['product_price']}" ?></span>
                                                                </span>
                                                            </span>
                                                            <span class="product-quantity">
                                                                (x1)
                                                            </span>
                                                            <div class="product-remove">
                                                                <a href="<?php echo "delete_cart.php?key1=$key"; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                            <?php }
                                            } ?>

                                        </ul>
                                        <div class="subtotal">
                                            <span class="total-title">Subtotal: </span>
                                            <span class="total-price">
                                                <span class="Price-amount">
                                                    $135
                                                </span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <a class="button button-viewcart" href="cart.php">
                                                <span>View Bag</span>
                                            </a>
                                            <a href="checkout.php" class="button button-checkout">
                                                <span>Checkout</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-account block-header moorabi-dropdown">
                                <a href="javascript:void(0);" data-moorabi="moorabi-dropdown">
                                    <span class="flaticon-profile"></span>
                                </a>
                                <div class="header-account moorabi-submenu">
                                    <div class="header-user-form-tabs">
                                        <ul class="tab-link">
                                            <li class="active">
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                            </li>
                                        </ul>
                                        <div class="tab-container">
                                            <div id="header-tab-login" class="tab-panel active">
                                                <form method="post" class="login form-login">
                                                    <p class="form-row form-row-wide">
                                                        <input type="email" placeholder="Email" class="input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" class="input-text" placeholder="Password">
                                                    </p>
                                                    <p class="form-row">
                                                        <label class="form-checkbox">
                                                            <input type="checkbox" class="input-checkbox">
                                                            <span>
                                                                Remember me
                                                            </span>
                                                        </label>
                                                        <input type="submit" class="button" value="Login">
                                                    </p>
                                                    <p class="lost_password">
                                                        <a href="#">Lost your password?</a>
                                                    </p>
                                                </form>
                                            </div>
                                            <div id="header-tab-rigister" class="tab-panel">
                                                <form method="post" class="register form-register">
                                                    <p class="form-row form-row-wide">
                                                        <input type="email" placeholder="Email" class="input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" class="input-text" placeholder="Password">
                                                    </p>
                                                    <p class="form-row">
                                                        <input type="submit" class="button" value="Register">
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="menu-bar mobile-navigation menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-container">
            <div class="container">
                <div class="header-nav-wapper main-menu-wapper">
                    <div class="vertical-wapper block-nav-categori">
                        <div class="block-title">
                            <span class="icon-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="text">All Categories</span>
                        </div>
                        <div class="block-content verticalmenu-content">
                            <ul class="moorabi-nav-vertical vertical-menu moorabi-clone-mobile-menu">

                                <?php
                                $queryallcat2 = "SELECT * FROM categories ";
                                $resultallcat2 = mysqli_query($conn, $queryallcat2);
                                while ($cat_all2 = mysqli_fetch_assoc($resultallcat2)) {
                                ?>

                                    <li class="menu-item">
                                        <a href="<?php echo "grid_products.php?catid={$cat_all2['cat_id']}"; ?>" class="moorabi-menu-item-title" title="New Arrivals"><?php echo "{$cat_all2['cat_name']}"; ?></a>
                                    </li>

                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="header-nav">
                        <div class="container-wapper">
                            <ul class="moorabi-clone-mobile-menu moorabi-nav main-menu " id="menu-main-menu">
                                <li class="menu-item ">
                                    <a href="index.php" class="moorabi-menu-item-title" title="Home">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a href="grid_products.php" class="moorabi-menu-item-title" title="Shop">Shop</a>
                                </li>
                                <li class="menu-item">
                                    <a href="about.php" class="moorabi-menu-item-title" title="About">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="header-device-mobile">
        <div class="wapper">
            <div class="item mobile-logo">
                <div class="logo">
                    <a href="index.php">
                        <img src="assets/images/logo.png" alt="img">
                    </a>
                </div>
            </div>
            <div class="item item mobile-search-box has-sub">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="header-searchform-box">
                        <form class="header-searchform">
                            <div class="searchform-wrap">
                                <input type="text" class="search-input" placeholder="Enter keywords to search...">
                                <input type="submit" class="submit button" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item mobile-settings-box has-sub">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="block-sub-item">
                        <h5 class="block-item-title">Currency</h5>
                        <form class="currency-form moorabi-language">
                            <ul class="moorabi-language-wrap">
                                <li class="active">
                                    <a href="#">
                                        <span>
                                            English (USD)
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            French (EUR)
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            Japanese (JPY)
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item menu-bar">
                <a class=" mobile-navigation  menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
    </div>