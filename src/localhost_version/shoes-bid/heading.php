<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; Any other head content must come *after* these tags -->
    
        <!-- Title  -->
        <title>Essence - Auction Market of Shoes</title>
    
        <!-- Favicon  -->
        <link rel="icon" href="img/core-img/favicon.ico">
    
        <!-- Core Style CSS -->
        <link rel="stylesheet" href="css/core-style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!--<link rel="stylesheet" href="css/page/main-button.css">-->
        <link rel="stylesheet" href="css/styleKeith.css">
    </head>

    <body>
        <header class="header_area">
            <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
                <!-- Classy Menu -->
                <nav class="classy-navbar" id="essenceNav">
                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                    
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    
                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li>
                                    <a href="#">Brand</a>
                                    <ul class="dropdown">
                                        <li><a href="searchResult.php?filter=adidas">Adidas</a></li>
                                        <li><a href="searchResult.php?filter=nike">Nike</a></li>
                                        <li><a href="searchResult.php?filter=reebok">Reebok</a></li>
                                        <li><a href="searchResult.php?filter=converse">Converse</a></li>
                                        <li><a href="searchResult.php?filter=vans">Vans</a></li>
                                        <li><a href="searchResult.php?filter=new balance">New Balance</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="#">Type</a>
                                    <ul class="dropdown">
                                        <li><a href="searchResult.php?filter=sneakers">Sneakers</a></li>
                                        <li><a href="searchResult.php?filter=highheels">HighHeels</a></li>
                                        <li><a href="searchResult.php?filter=boots">Boots</a></li>
                                        <li><a href="searchResult.php?filter=sandals">Sandals</a></li>
                                        <li><a href="searchResult.php?filter=slippers">Slippers</a></li>
                                        <li><a href="searchResult.php?filter=oxfords">Oxfords</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="about.php">About Us</a>
                                </li>
                                
                                <li>
                                    <a href="faq.php">FAQ</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
                
                <!-- Header Meta Data -->
                <?php
                    if(isset($_SESSION['user'])) {
                        include_once('logedHeading.php');
                    }else {
                        include_once('loginHeading.php');
                        include_once($_SERVER['DOCUMENT_ROOT'] .'/shoes-bid/loginCart.php');
                    }
                ?> 
            </div>
        </header>
    </body>
</html>

<!-- jQuery -->
<script type="text/javascript" src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script type="text/javascript" src="js/plugins.js"></script>
<!-- Classy Nav js -->
<script type="text/javascript" src="js/classy-nav.min.js"></script>
 <!--ui-->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--owl-->
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<!-- Active js -->
<script type="text/javascript" src="js/active.js"></script>