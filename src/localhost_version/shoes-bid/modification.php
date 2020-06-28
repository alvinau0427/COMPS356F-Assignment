<?php
    include_once('heading.php');
    session_start();
    require_once('conn.php');
    $sql = "select * from account where userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<link rel = "stylesheet" href = "dist/sweetalert.css">

<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src = "dist/sweetalert-dev.js"></script>
        
<script>
    $(document).ready(function () {
        var msg = GetURLParameter("msg");
        if(msg == "suc") {
            swal("Your Information has been modified", "Modify Success!!", "success");
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
<body>
    <!-- # Breadcumb Area Start # -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Your Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- # Breadcumb Area End # -->
    <form action='updateInfo.php' method='post'>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>User Name</label>
                    <?php
                        echo "<h2>".$row['userName']."</h2>";
                    ?>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Sex</label>
                    <?php
                        if($row['sex'] == 'M') {
                            echo "<h2>Male</h2>";
                        }else {
                            echo "<h2>Female</h2>";
                        }
                    ?>
                </div>
                    
                <div class="col-md-6 mb-3">
                    <label>Date of Birth</label>
                    <?php
                        echo "<h2>".$row['DOB']."</h2>";
                    ?>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label>Address</label>
                    <?php
                        echo "<input class='form-control' type='textarea' name='address' col='50' row='4' value='".$row['Address']."'/>"
                    ?>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Phone Number</label>
                    <?php
                        echo "<input class='form-control' type='text' name='phone' value='".$row['Phone']."'/>"
                    ?>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Email Address</label>
                    <?php
                        echo "<input class='form-control' type='text'name='email' value='".$row['Email']."'/>"
                    ?>
                </div>
                
                <div class="col-md-6 mb-3">
                    <input class='btn essence-btn' type='submit' value='Modify'>
                </div>
            </div>
        </div>
    </form>
    
    <!-- # Breadcumb Area Start # -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Your Activities</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- # Breadcumb Area End # -->

    <div class="container">
        <?php
            echo '<table class="favTable">';
            echo '<tr class="favTableTitle text-center font-weight-bold"><td>Item</td><td>Date</td><td>Price</td><td>Action</td></tr>';
            $sql = "select * from trade inner join product on product.productID = trade.productID where seller='".$_SESSION['id']."' or buyer='".$_SESSION['id']."'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr class="favTableRow">';
                    $form=
<<<EOD
                    <td class="text-center"><a href='productDetails.php?productID=%s'>%s</a></td><td class="text-center">%s</td><td class="text-center">%s</td>
EOD;

                    printf($form,$row['productID'],$row['productName'],$row['tradeDate'],$row['bidPrice']);
                    // Check Seller
                    if($row['buyer'] == null){ 
                        echo '<td class="text-center">Sell</td>';
                    }else {
                        echo '<td class="text-center">Bid</td>';
                    }
                    echo '</tr>';
                }
            }else {
                echo '<h2 class="text-center">Nothing you have bid or sell</h2>';
            }
            echo '</table>';
        ?>
    </div>

    <!-- # Breadcumb Area Start # -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Your Messages</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- # Breadcumb Area End # -->
    
    <div class="container">
        <?php
            echo '<table class="favTable">';
            echo '<tr class="favTableTitle text-center font-weight-bold"><td>ID</td><td>Date</td><td>Content</td></tr>';
            $sql = "select * from mail where recieverID='".$_SESSION['id']."'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr class="favTableRow">';
                    $form=
<<<EOD
                    <td class="text-center">%s</td><td class="text-center">%s</td><td class="text-center">%s</td>
EOD;
                    printf($form,$row['mailID'],$row['time'],$row['content']);
                    echo '</tr>';
                }
            }else {
                echo '<h2 class="text-center">No messages</h2>';
            }
            echo '</table>';
        ?>
    </div>
    
    <?php
       include_once('footing.php');
    ?>
</body>