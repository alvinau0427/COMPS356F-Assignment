<?php 
    session_start();
    require_once('conn.php');
    extract($_GET);
    $sql = "delete from favour where userID='".$_SESSION['id']."' and prodID='".$_GET['productID']."'";
    $result = mysqli_query($conn, $sql);
    header("Location: ./favList.php");
?>