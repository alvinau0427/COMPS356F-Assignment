<?php 
    extract($_POST);
    require_once('conn.php');
    session_start();
    
    $sql = "select * from comment";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    $num = 10000 + $count +1 ;
    $comID = "C".$num;
    $content = $_POST['content'];
    $pid = $_POST['productID'];
    
    if(!isset($_SESSION['id'])){
        $sql = "insert into comment values('".$comID."','".$pid."','A10000','".$content."')";
    }else{
        $sql = "insert into comment values('".$comID."','".$pid."','".$_SESSION['id']."','".$content."')";
    }
    mysqli_query($conn,$sql);
    header("Location: ./productDetails.php?productID=".$pid);
?>