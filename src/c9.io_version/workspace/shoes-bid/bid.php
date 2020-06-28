<?php
    session_start();
    extract($_POST);
    require_once('conn.php');
    $sql = 'select * from product where productID ="'.$_POST['productID'].'";';
    echo $sql;
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $recevier = $row['highBidderID'];
    $prodn = $row['productname'];
    $date = date('Y-m-d');
    
    if($_POST['bidPrice'] > $row['curPrice']) {
        $sql = "update product set curPrice='".$_POST['bidPrice']."', highBidderID ='".$_SESSION['id']."' where productID ='".$_POST['productID']."';";
        $result = mysqli_query($conn, $sql);
    
        $sql = "select * from trade where buyer='".$_SESSION['id']."' and productID='".$_POST['productID']."'";
        $reuslt = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            $sql = "update trade set bidPrice='".$_POST['bidPrice']."', tradeDate='".$date."' where buyer='".$_SESSION['id']."' and productID='".$_POST['productID']."'";
            mysqli_query($conn, $sql);
        }else {
            $sql = "select * from trade";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            $num = 10000 + $count +1 ;
            $tradeID = "T".$num;
            $getSeller = "select sellerID from product where productID ='".$_POST['productID']."';";
            $sellerResult = mysqli_query($conn, $getSeller);
            $sellerRow = mysqli_fetch_assoc($sellerResult);
            $sql = "insert into trade values('".$tradeID."','".$sellerRow['sellerID']."','".$_SESSION['id']."','".$_POST['productID']."','".$_POST['bidPrice']."','".$date."')";
            mysqli_query($conn, $sql);
        }
    
    
        if($recevier != null) {
            $sql = "select * from mail";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            $num = 10000 + $count +1 ;
            $mailID = "M".$num;
            $sql = "insert into mail values('".$mailID."','".$recevier."','".$date."','Your price on ".$prodn." are not the highest.')";
            $result=mysqli_query($conn, $sql);
        }
        header("Location: ./searchResult.php?msg=bided");
    }else{
        // lower than curPrice
    }
?>