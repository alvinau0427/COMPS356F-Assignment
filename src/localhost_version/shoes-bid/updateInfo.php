<?php
    session_start();
    require_once('conn.php');
    
    $sql = "update account set Address='".$_POST['address']."', Phone='".$_POST['phone']."', Email='".$_POST['email']."' where userID='".$_SESSION['id']."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    header("Location: ./modification.php?msg=suc");
?>