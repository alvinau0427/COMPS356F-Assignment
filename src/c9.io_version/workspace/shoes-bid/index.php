<?php 
    session_unset();
    session_start();
    include_once('heading.php');
    require_once('conn.php');
    $rank = 1;
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "description" content = "">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; Any other head content must come *after* these tags -->
    
        <!-- Core Style CSS -->
        <link rel = "stylesheet" href = "css/core-style.css">
        <!--<link rel="stylesheet" href="css/page/main-button.css">-->
        
        <!-- Login CSS -->
        <link rel = "stylesheet" href = "dist/sweetalert.css">
    </head>
        
    <body>
        <!-- # Welcome Area Start # -->
        <div class = "single_product_thumb clearfix">
            <div class = "product_thumbnail_slides owl-carousel">
                <section class = "welcome_area bg-img background-overlay" style = "background-image: url(img/bg-img/bg-1-1.jpg);">
                    <div class = "container h-100">
                        <div class = "row h-100 align-items-center">
                            <div class = "col-8">
                                <div class = "hero-content">
                                    <h4>ESSENCE - THE STOCK MARKET OF THINGS®</h4>
                                    <h2>BUY AND SELL AUTHENTIC SHOES</h2>
                                    <a href = "searchResult.php" class = "btn essence-btn">Browse on our live market place</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class = "welcome_area bg-img background-overlay" style = "background-image: url(img/bg-img/bg-1-2.jpg);">
                    <div class = "container h-100">
                        <div class = "row h-100 align-items-center">
                            <div class = "col-8">
                                <div class = "hero-content">
                                    <h4>ESSENCE - THE STOCK MARKET OF THINGS®</h4>
                                    <h2>BUY AND SELL AUTHENTIC SHOES</h2>
                                    <a href = "searchResult.php" class = "btn essence-btn">Browse on our live market place</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- # Welcome Area End # -->
    
        <!-- # First Row Catagory Area Start # -->
        <div class = "top_catagory_area section-padding-80 clearfix">
            <div class = "container">
                <div class = "row justify-content-center">
                    
                    <!-- Single Catagory -->
                    <div class = "col-12 col-sm-6 col-md-4">
                        <div class = "single_catagory_area d-flex align-items-center justify-content-center bg-img" style = "background-image: url(img/bg-img/bg-2-1.jpg);">
                            <div class = "catagory-content">
                                <a href = "searchResult.php?filter=sneakers">Sneakers</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Catagory -->
                    <div class = "col-12 col-sm-6 col-md-4">
                        <div class = "single_catagory_area d-flex align-items-center justify-content-center bg-img" style = "background-image: url(img/bg-img/bg-3-1.jpg);">
                            <div class = "catagory-content">
                                <a href = "searchResult.php?filter=highheels">HighHeels</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Catagory -->
                    <div class = "col-12 col-sm-6 col-md-4">
                        <div class = "single_catagory_area d-flex align-items-center justify-content-center bg-img" style = "background-image: url(img/bg-img/bg-4-1.jpg);">
                            <div class = "catagory-content">
                                <a href = "searchResult.php?filter=boots">Boots</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- # First Row Catagory Area End # -->
        
        <!-- # Second Row Catagory Area Start # -->
        <div class = "top_catagory_area section-padding-0-80 clearfix">
            <div class = "container">
                <div class = "row justify-content-center">
                    <!-- Single Catagory -->
                    <div class = "col-12 col-sm-6 col-md-4">
                        <div class = "single_catagory_area d-flex align-items-center justify-content-center bg-img" style = "background-image: url(img/bg-img/bg-2-2.jpg);">
                            <div class = "catagory-content">
                                <a href = "searchResult.php?filter=sandals">Sandals</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Catagory -->
                    <div class = "col-12 col-sm-6 col-md-4">
                        <div class = "single_catagory_area d-flex align-items-center justify-content-center bg-img" style = "background-image: url(img/bg-img/bg-3-2.jpg);">
                            <div class = "catagory-content">
                                <a href = "searchResult.php?filter=slippers">Slippers</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Catagory -->
                    <div class = "col-12 col-sm-6 col-md-4">
                        <div class = "single_catagory_area d-flex align-items-center justify-content-center bg-img" style = "background-image: url(img/bg-img/bg-4-2.jpg);">
                            <div class = "catagory-content">
                                <a href = "searchResult.php?filter=oxfords">Oxfords</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- # Second Row Catagory Area End # -->
        
        <!-- SweetAlert js -->
        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src = "dist/sweetalert-dev.js"></script>
        
        <script>
            $(document).ready(function () {
                var msg = GetURLParameter("msg");
                if(msg == "true") {
                    swal("Success!!", "Login Success!!", "success");
                }
                if(msg == "IncPW") {
                    swal("Incorrect Password!!", "Login Again", "error");
                }
                if(msg == "NoAC") {
                    swal("No such account!!", "Login Again", "error");
                }
                if(msg == "Regeds") {
                    swal("The account had created", "Register Again", "error");
                }
                if(msg == "RegSucc") {
                    swal("Account has been created", "Register Sucess!!", "success");
                }
                if(msg == "Notlogin") {
                    swal("You have to login first", "Login first!!", "error");
                }
                window.history.replaceState({}, document.title, "/shoes-bid/index.php");
            });
            
            function GetURLParameter(sParam) {
                var sPageURL = window.location.search.substring(1);
                var sURLVariables = sPageURL.split('&');
                for (var i = 0; i < sURLVariables.length; i++) {
                    var sParameterName = sURLVariables[i].split('=');
                    if (sParameterName[0] == sParam) {
                        return sParameterName[1];
                    }
                }
            }
        </script>

        <!-- # New Arrivals Area Start # -->
        <section class = "new_arrivals_area section-padding-80 clearfix">
            <div class = "container">
                <div class = "row">
                    <div class = "col-12">
                        <div class = "section-heading text-center">
                            <h2>Popular Products</h2>
                        </div>
                    </div>
                </div>

                <div class = "container">
                    <div class = "row">
                        <div class = "col-12">
                            <div class = "popular-products-slides owl-carousel">
                                <!-- Single Product Start -->
                                <?php
                                    $sql = 'select * from rank inner join product on rank.productID=product.productID order by view desc';
                                    $result=mysqli_query($conn, $sql);
                                    
                                    for($i = 1; $i <= 5; $i++) {
                                        $row = mysqli_fetch_assoc($result);
                                        echo "<div class = 'single-product-wrapper'>";
                                        
                                        // Product Image
                                        echo "<div class = 'product-img'>";
                                        $sql1="select * from product where productID = '".$row['productID']."'";
                                        $result1=mysqli_query($conn, $sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                        echo "<img src = '".$row1['photoPath']."' alt = ''>";
                                        
                                        // Hover Thumb
                                        echo "<img class = 'hover-img' src = '".$row1['photoPath']."' alt = ''>";
                                        
                                        // Favourite
                                        echo "<div class='product-favourite'>";
                                        echo "#$i";
                                        echo "</div>";
                                        echo "</div>";
                                        
                                        // Product Description
                                        echo "<div class = 'product-description'>";
                                        echo "<span>".$row1['brand']."</span>";
                                        echo "<a href = 'productDetails.php?productID=".$row['productID']."'><h6>".$row1['productName']."</h6></a>";
                                        if ($row1['curPrice'] == null) { 
                                            echo "<p class = 'product-price'>\$".$row1['miniPrice']."</p>";
                                        } else {
                                            echo "<p class = 'product-price'>\$".$row1['curPrice']."</p>";
                                        }
                                        
                                        // Hover Content
                                        echo "<div class = 'hover-content'>";
                                        
                                        // Add to Cart
                                        echo "<div class = 'add-to-cart-btn'>";
                                        echo "<a href = 'productDetails.php?productID=".$row['productID']."' class = 'btn essence-btn'>Product details</a>";
                                        echo "</div></div></div></div>";
                                    }
                                ?>
                                <!-- Single Product End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- # New Arrivals Area End # -->
        
        <?php
            include_once('footing.php');
        ?>
    </body>
</html>