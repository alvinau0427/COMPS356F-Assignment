<?php
    session_start();
    include_once('heading.php');
    require_once('conn.php');
    extract($_GET);
    $sql = "select * from product where (productName like '%".$_GET['search']."%' or type like '%".$_GET['search']."%') and sellerID <> '".$_SESSION['id']."'";
    
    if($_GET['sort'] == 'asc') {
        $sql = $sql.'order by productName ';
    }else if($_GET['sort'] == 'desc') {
        $sql = $sql.'order by productName desc';
    }
    
    $result = mysqli_query($conn,$sql);
    if(isset($_GET['filter'])) {
        switch ($_GET['filter']){
            case 'sneakers':
                $type = 'Sneakers';        
                break;
            case 'highheels':
                $type = 'HighHeels';
                break;
            case 'boots':
                $type = 'Boots';
                break;
            case 'sandals':
                $type = 'Sandals';
                break;
            case 'slippers':
                $type = 'Slippers';
                break;
            case 'oxfords':
                $type = 'Oxfords';
                break;
            case 'adidas':
                $brand = 'Adidas';
                break;
            case 'nike':
                $brand = "Nike";
                break;
            case 'reebok':
                $brand = "Reebok";
                break;
            case 'converse':
                $brand = "Converse";
                break;
            case 'vans':
                $brand = "Vans";
                break;
            case 'new balance':
                $brand = "New Balance";
                break;
            case 'stuart weitzman':
                $brand = "Stuart Weitzman";
        }
        $sql = "select * from product where (type='".$type."' or brand='".$brand."') and sellerID <> '".$_SESSION['id']."'";
        $result = mysqli_query($conn, $sql);
    }
    
    if(isset($_GET['color'])) {
        switch ($_GET['color']){
            case 'White':
                $color = 'White';        
                break;
            case 'Grey':
                $color = 'Grey';
                break;
            case 'Black':
                $color = 'Black';
                break;
            case 'Blue':
                $color = 'Blue';
                break;
            case 'Pink':
                $color = 'Pink';
                break;
            case 'Yellow':
                $color = 'Yellow';
                break;
            case 'Orange':
                $color = 'Orange';
                break;
            case 'Brown':
                $color = "Brown";
                break;
            case 'Green':
                $color = "Green";
                break;
            case 'Purple':
                $color = "Purple";
                break;
        }
        $sql = "select * from product where color='".$color."' and sellerID <> '".$_SESSION['id']."'";
        $result = mysqli_query($conn,$sql);
    }
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "description" content = "">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; Any other head content must come *after* these tags -->
    
        <!-- Favicon  -->
        <link rel = "icon" href = "img/core-img/favicon.ico">
    
        <!-- Core Style CSS -->
        <link rel = "stylesheet" href = "css/core-style.css">
        <link rel = "stylesheet" href = "css/page/style.css">
        
        <link rel = "stylesheet" href = "dist/sweetalert.css">
        
        <!-- SweetAlert js -->
        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src = "dist/sweetalert-dev.js"></script>
        
        <script>
            $(document).ready(function () {
                var msg = GetURLParameter("msg");
                if(msg == "addFav") {
                    swal("Added to Favourable", "Favour Success!!", "success");
                }
                if(msg == "added") {
                    swal("Already Added", "Mistake", "error");
                }
                if(msg == "bided") {
                    swal("You have bid the product", "Bid it", "success");
                }
                
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
        
        <script type="text/javascript" src="js/jquery/jquery-2.2.4.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $('#sortByselect').change(function(){
                    var sort = $('.nice-select .selected').attr('data-value');
                    if(sort =='A-Z') {
                        window.location.replace('./searchResult.php?search='+"<?php Print($_GET['search']); ?>" + '&sort=asc');
                    }else if(sort == 'Z-A') {
                        window.location.replace('./searchResult.php?search='+"<?php Print($_GET['search']); ?>" + '&sort=desc');
                       
                    }else {
                        window.location.replace('./searchResult.php?search='+"<?php Print($_GET['search']); ?>" + '&sort=');
                    }
                });
            });
            
            $(document).ready(function(){
                $(".slider-range-price").on("slidestop", function(event, ui) {
                    for($i = 0 ; $i < $('.priceForFilter').length ; $i++) {
                        if($('.priceForFilter').eq($i)[0].value < document.getElementById('amount-min').value) {
                            $('.priceForFilter').eq($i).parent().css('display','none');
                        }else if($('.priceForFilter').eq($i)[0].value > document.getElementById('amount-max').value) {
                            $('.priceForFilter').eq($i).parent().css('display','none');
                        }else if($('.priceForFilter').eq($i)[0].value > document.getElementById('amount-min').value && $('.priceForFilter')[$i].value < document.getElementById('amount-max').value) {
                            $('.priceForFilter').eq($i).parent().css('display','block');
                        }
                    }
                 });
            });
        </script>
    </head>
       
    <body>
        <!-- # Breadcumb Area Start # -->
        <div class = "breadcumb_area bg-img" style = "background-image: url(img/bg-img/breadcumb.jpg);">
            <div class = "container h-100">
                <div class = "row h-100 align-items-center">
                    <div class = "col-12">
                        <div class = "page-title text-center">
                            <h2>Products</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- # Breadcumb Area End # -->
    
        <!-- # Shop Grid Area Start # -->
        <section class = "shop_grid_area section-padding-80">
            <div class = "container">
                <div class = "row">
                    <div class = "col-12 col-md-4 col-lg-3">
                        <div class = "shop_sidebar_area">
    
                            <!-- # Single Widget # -->
                            <div class = "widget catagory mb-50">
                                <!-- Widget Title -->
                                <h6 class = "widget-title mb-30">Catagories</h6>
    
                                <!--  Catagories  -->
                                <div class = "catagories-menu">
                                    <ul id = "menu-content2" class = "menu-content collapse show">
                                        <!-- Single Item -->
                                        <li data-toggle = "collapse" data-target = "#">
                                            <a>Brand</a>
                                            <ul class = "sub-menu collapse show" id = "brand">
                                                <li><a href = "searchResult.php">All</a></li>
                                                <li><a href = "searchResult.php?filter=adidas">Adidas</a></li>
                                                <li><a href = "searchResult.php?filter=nike">Nike</a></li>
                                                <li><a href = "searchResult.php?filter=reebok">Reebok</a></li>
                                                <li><a href = "searchResult.php?filter=converse">Converse</a></li>
                                                <li><a href = "searchResult.php?filter=vans">Vans</a></li>
                                                <li><a href = "searchResult.php?filter=new balance">New Balance</a></li>
                                            </ul>
                                        </li>
                                        
                                        <!-- Single Item -->
                                        <li data-toggle = "collapse" data-target = "#">
                                            <a>Type</a>
                                            <ul class = "sub-menu collapse show" id = "type">
                                                <li><a href = "searchResult.php?filter=sneakers">Sneakers</a></li>
                                                <li><a href = "searchResult.php?filter=highheels">HighHeels</a></li>
                                                <li><a href = "searchResult.php?filter=boots">Boots</a></li>
                                                <li><a href = "searchResult.php?filter=sandals">Sandals</a></li>
                                                <li><a href = "searchResult.php?filter=slippers">Slippers</a></li>
                                                <li><a href = "searchResult.php?filter=oxfords">Oxfords</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                            <!-- # Single Widget # -->
                            <div class = "widget price mb-50">
                                <!-- Widget Title -->
                                <h6 class = "widget-title mb-30">Filter by</h6>
                                <!-- Widget Title 2 -->
                                <p class = "widget-title2 mb-30">Price</p>
    
                                <div class = "widget-desc">
                                    <div class = "slider-range">
                                        <div data-min = "49" data-max = "360" data-unit = "$" class = "slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min = "49" data-value-max = "360" data-label-result = "Range:">
                                            <div class = "ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class = "ui-slider-handle ui-state-default ui-corner-all" tabindex = "0"></span>
                                            <span class = "ui-slider-handle ui-state-default ui-corner-all" tabindex = "0"></span>
                                        </div>
                                        <div class = "range-price">Range:   $<input type = "text" class = "text-center" id = "amount-min" readonly style = "border:0; width:40px; font-weight:bold;">-$<input type = "text" class = "text-center" id = "amount-max" readonly style = "border:0;width:40px;  font-weight:bold;"></div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- # Single Widget # -->
                            <div class = "widget color mb-50">
                                <!-- Widget Title 2 -->
                                <p class = "widget-title2 mb-30">Color</p>
                                <div class = "widget-desc">
                                    <ul class = "d-flex">
                                        <li><a href = "searchResult.php?color=White" class = "color1"></a></li>
                                        <li><a href = "searchResult.php?color=Grey" class = "color2"></a></li>
                                        <li><a href = "searchResult.php?color=Black" class = "color3"></a></li>
                                        <li><a href = "searchResult.php?color=Blue" class = "color4"></a></li>
                                        <li><a href = "searchResult.php?color=Pink" class = "color5"></a></li>
                                        <li><a href = "searchResult.php?color=Yellow" class = "color6"></a></li>
                                        <li><a href = "searchResult.php?color=Orange" class = "color7"></a></li>
                                        <li><a href = "searchResult.php?color=Brown" class = "color8"></a></li>
                                        <li><a href = "searchResult.php?color=Green" class = "color9"></a></li>
                                        <li><a href = "searchResult.php?color=Purple" class = "color10"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class = "col-12 col-md-8 col-lg-9">
                        <div class = "shop_grid_product_area">
                            <div class = "row">
                                <div class = "col-12">
                                    <div class = "product-topbar d-flex align-items-center justify-content-between">
                                        <!-- Total Products -->
                                        <div class = "total-products">
                                            <p>
                                                <span>
                                                    <?php
                                                        $num_rows = mysqli_num_rows($result);
                                                        echo $num_rows;
                                                    ?>
                                                </span>
                                                products foun
                                            </p>
                                        </div>
                                        
                                        <!-- Sorting -->
                                        <div class = "product-sorting d-flex">
                                            <p>Sort by:</p>
                                            <form action = "#" method = "get">
                                                <select name = "select" id = "sortByselect">
                                                    <option value = "Featured">Featured</option>
                                                    <option value = "A-Z" class = "A-Z">Alphabetically, A-Z</option>
                                                    <option value = "Z-A" class = "Z-A">Alphabetically, Z-A</option>
                                                </select>
                                                <input type = "submit" class = "d-none" value = "">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <?php
                                    if(mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $dayplus = abs(strtotime(date('Y-m-d')) - strtotime($row['postDate']));
                                            $day = $row['productDur'] - ($dayplus / 86400);
                                            $dayString=$day." days left";
                                            $form =
<<<EOD
                                            <div class="col-12 col-sm-6 col-lg-4">
                                                </a>
                                                <input type="hidden" class="priceForFilter" value="%s">
                                                <form method="post" action="addFav.php" name="addFav">
                                                    <div class="single-product-wrapper">
                                                        <input type="hidden" value="%s" name="hidden">
                                                        <div class="product-img">
                                                            <a href="productDetails.php?productID=%s"><img src="%s" style="margin-top:40px;"></a>
                                                            <div class="product-badge new-badge">
                                                                <span>%s</span>
                                                            </div>
                                                            <div class="product-favourite" name="product-favourite">
                                                                <a href="addFav.php?productID=%s" class="favme fa fa-heart"></a>
                                                            </div>
                                                            <div class="product-description" style="margin-top:20px;">
                                                                <span>%s</span>
                                                                <a href="productDetails.php?productID=%s">
                                                                <h6>%s</h6>
                                                                <p class="product-price">$%s</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
EOD;

                                            if($day < 0) {
                                                $dayString = 'Auction Ended';
                                            }
                                            if(isset($row['curPrice'])) {
                                                printf($form,$row['curPrice'],$row['productID'],$row['productID'],$row['photoPath'],$dayString,$row['productID'],$row['brand'],$row['productID'],$row['productName'],$row['curPrice'],$row['productID']);
                                            }else {
                                                printf($form,$row['miniPrice'],$row['productID'],$row['productID'],$row['photoPath'],$dayString,$row['productID'],$row['brand'],$row['productID'],$row['productName'],$row['miniPrice'],$row['productID']);
                                            }
                                        }
                                    }else{
                                        echo '<label>No result</label>';
                                    }
                                ?>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <!--
                        <nav aria-label="navigation">
                            <ul class="pagination mt-50 mb-70">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">21</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                        -->
                    </div>
                </div>
            </div>
        </section>
        <!-- # Shop Grid Area End # -->

        <?php
            include_once('footing.php');
        ?>
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