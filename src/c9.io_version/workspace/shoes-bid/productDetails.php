<?php
    include_once('heading.php');
    require_once('conn.php');
    extract($_GET);
    $pid = $_GET["productID"];
    $sql = "select * from rank where productID='".$pid."'";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);    
        $sql = "update rank set view='". ++$row['view']. "' where productID='".$pid."'";
        mysqli_query($conn,$sql);
    }else {
        $sql = "insert into rank values('".$pid."',1)";
        mysqli_query($conn, $sql);
    }
    
    $sql = "select * from product where productID = '$pid'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $dayplus = abs(strtotime(date('Y-m-d')) - strtotime($row['postDate']));
    $day = $row['productDur']-($dayplus/86400);
    $quantity = $row['quantity'];
    $paymentMethod = $row['paymentMethod'];
    $delievry = $row['delievry'];
    $curPrice = $row['curPrice'];
    $miniPrice = $row['miniPrice'];
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "description" content="">
        <meta http-equiv = "X-UA-Compatible">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; Any other head content must come *after* these tags -->
    
        <!-- Favicon  -->
        <link rel = "icon" href = "img/core-img/favicon.ico">
    
        <!-- Comment Box Css -->
        <link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        
           <!-- Core Style CSS -->
        <link rel = "stylesheet" href = "css/core-style.css">
        <link rel = "stylesheet" href = "css/owl.carousel.css">
        <link rel = "stylesheet" href = "css/page/style.css">
        
        <script>
            $(document).ready(function(){
                $("[data-toggle=tooltip]").tooltip();
            });
        </script>
    </head>

    <body>
        <!-- # Single Product Details Area Start # -->
        <section class = "single_product_details_area d-flex align-items-center">
            <!-- Single Product Thumb -->
            <div class = "single_product_thumb clearfix">
                <div class = "product_thumbnail_slides owl-carousel">
                    <?php
                        echo '<img src="' . $row["photoPath"] . '" style="display: block; margin-left: auto; margin-right: auto; width: 60%;" alt=""></img>';
                    ?>
                </div>
            </div>

            <!-- Single Product Description -->
            <div class = "single_product_desc clearfix">
                <input type = 'hidden' name = 'productID' value = " <?php echo $row['productID'] ?>">
                <span><?php echo $row["brand"]; ?></span>
                <h2><?php echo $row["productName"]; ?></h2>
                
                <span>
                    <?php
                        $sql1 = "select * from account where userID = '".$row['sellerID']."'";
                        $result1 = mysqli_query($conn,$sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        echo "sold by ".$row1["userName"]."";
                    ?>
                </span>
                
                <p class = "product-price">
                    <?php
                        if($day < 0)  {
                            echo "Auction ended";
                        }else {
                            if(isset($row['curPrice'])) {
                                echo "Highest Bid: $".$row['curPrice'];
                            }else {
                                echo "Start at: $".$row['miniPrice'];
                            }
                        }
                    ?>
                </p>
                
                <p class = "product-price">
                    <?php
                        if(isset($row['curPrice'])) {
                            $sql = "select userName from account where userID='".$row['highBidderID']."'";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            echo "Highest Bidder: ".$row['userName'];
                        }else {
                            echo "No one has bidded on this item yet.";
                        }
                    ?>
                </p>
                
                <div class = "d-flex mt-50 mb-30"></div>
                
                <p class = "product-desc">
                    <?php 
                        echo "Quantity: ".$quantity."<br>Payment Method: ";
                        if($paymentMethod == "Cash") {
                            echo "By Cash";
                        }else if($paymentMethod == "BankTransfer") {
                            echo "By Bank Transfer";
                        }else if($paymentMethod == "CreditCard") {
                            echo "By Credit Card";
                        }
                        
                        echo "<br>Delivery Method: ";
                        if($delievry == "Delivery") {
                            echo "Via Delivery Company";
                        }else if($delievry == "FaceToFace") {
                            echo "Face To Face Transaction";
                        }
                        echo "<br>";
                    ?>
                </p>
    
                <!-- Form -->
                <form class = "cart-form clearfix" method = "post" action = "bid.php">
                    <!-- Cart & Favourite Box -->
                    <div class = "cart-fav-box d-flex align-items-center">
                        <!-- Cart -->
                        <button type = "submit" name = "addtocart" value = "5" class = "btn essence-btn" <?php if($day < 0 || !isset($_SESSION['user'])){echo "disabled";} ?>>Bid</button>
                        <!-- Favourite -->
                        <div class="product-favourite ml-4">
                            <a href="addFav.php?productID= <?php echo $pid ?>" class = "favme fa fa-heart"></a>
                        </div>
                        <lable class="pl-3 pr-1">$</lable><input class = "form-control w-25" type = 'number' min = '<?php if(isset($curPrice)){echo ++$curPrice;}else{ echo ++$miniPrice;} ?>' max = '9999' step = '1' value = '<?php if(isset($curPrice)){echo $curPrice;}else{ echo $miniPrice;} ?>' name = 'bidPrice'/>
                        <input type = 'hidden' name = 'productID' value = "<?php echo $pid ?>">
                    </div>
                </form>
            </div>
        </section>
        <!-- # Single Product Details Area End # -->
        
        <!-- # Breadcumb Area Start # -->
        <div class = "breadcumb_area bg-img" style = "background-image: url(img/bg-img/breadcumb.jpg);">
            <div class = "container h-100">
                <div class = "row h-100 align-items-center">
                    <div class = "col-12">
                        <div class = "page-title text-center">
                            <h2>Comments</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- # Breadcumb Area End # -->
        
        
        <!-- # Comment Area Start # -->
        <div class="commetArea">
            <table>
                <div class="container">
                    <div class="row">
                        <?php
                            $sql = "select * from comment inner join account on comment.userID = account.userID where comment.productID='".$pid."' order by comID ";
                            $result = mysqli_query($conn, $sql);
                            
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)){
                                    $form =
<<<EOD
                                    <div class="col-sm-1">
                                        <div class="thumbnail">
                                            <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                        </div>
                                    </div>
                
                                    <div class="col-sm-5">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <strong>%s</strong> <span class="text-muted">commented</span>
                                            </div>
                                            <div class="panel-body">
                                                %s
                                            </div>
                                        </div>
                                    </div>
EOD;
                                    printf($form,$row['userName'],$row['content']);
                                }
                            }else {
                                echo '<p><h2 class="text-center">No comment has given</h2></p>';
                            }
                        ?>
                    </div>
                </div>
            </table>

            <div class = "container commet">
                <div class = "row clearfix">
                    <div class = "col-md-12">
                        <div class = "widget-area no-padding blank">
                            <div class = "status-upload">
                                <form action = 'comment.php' method = 'post'>
                                    <textarea placeholder = "Please leave your comment here?" name = 'content'></textarea>
                                    <input type = "hidden" value = "<?php echo $pid; ?>" name = "productID"/>
            						<button type = "submit" class = "btn btn-success green"><i class = "fa fa-share"></i>Share</button>
            					</form>
            				</div>
            			</div>
            		</div>
                </div>
            </div>
        </div>

        <?php
            include_once('footing.php');
        ?>
    </body>
</html>