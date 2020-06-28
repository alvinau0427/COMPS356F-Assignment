<?php
    require_once('conn.php');
    extract($_GET);
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: ./index.php?msg=Notlogin");
    }else {
        $sql = "select * from favour where userID='".$_SESSION['id']."' and prodID='".$_GET['productID']."'";
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result) > 0) {
            header("Location: ./searchResult.php?msg=added");
        }else {
            $sql = "insert into favour values('".$_SESSION['id']."','".$_GET['productID']."')";
            $result = mysqli_query($conn, $sql);
            header("Location: ./searchResult.php?msg=addFav");
        }
    }
?>