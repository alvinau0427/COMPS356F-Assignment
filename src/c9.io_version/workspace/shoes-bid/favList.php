<?php
    include_once('heading.php');
    session_start();
    require_once('conn.php');
?>

<!DOCTYPE html>
<html lang = "en">
    <body>
        <!-- # Breadcumb Area Start # -->
        <div class = "breadcumb_area bg-img" style = "background-image: url(img/bg-img/breadcumb.jpg);">
            <div class = "container h-100">
                <div class = "row h-100 align-items-center">
                    <div class = "col-12">
                        <div class = "page-title text-center">
                            <h2>Favourite List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- # Breadcumb Area End # -->
        
        <div class = "container">
            <?php 
                echo '<table class="favTable">';
                echo '<tr class="favTableTitle text-center font-weight-bold"><td colspan="2">Item</td><td>Price</td><td>Remove From List</td></tr>';
                $sql = " select * from favour inner join product on product.productID = favour.prodID where favour.userID ='".$_SESSION['id']."'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $form =
<<<EOD
                        <tr class="favTableRow"><td width="15%%"><a href='productDetails.php?productID=%s'><img  src="%s"></img></a></td><td><a href='productDetails.php?productID=%s'>%s</a></td><td class="text-center">$ %s</td><td class="text-center"><a href='unFav.php?productID=%s'><i class="fa fa-trash-o"></i></a></td></tr>
EOD;
                        if(isset($row['curPrice'])) {
                            printf($form,$row['prodID'],$row['photoPath'],$row['prodID'],$row['productName'], $row['curPrice'], $row['prodID']);
                        }else {
                            printf($form,$row['prodID'],$row['photoPath'],$row['prodID'],$row['productName'], $row['miniPrice'], $row['prodID']);
                        }
                    }
                }else {
                    echo'No item added into favourite list';
                }
                echo '</table>'
            ?>
        </div>
        
        <?php
           include_once('footing.php');
        ?>
    </body>
</html>