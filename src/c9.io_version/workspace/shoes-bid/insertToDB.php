<?php
    session_start();
    require_once('conn.php');
    extract($_POST);
    $target_dir = "upload/";

    // Testing
    $image = $_FILES['addPict']['name'];
    $target = "upload/";
    $url = $target.$_FILES['addPict']['name'];

    $target_file = $target_dir . basename($_FILES['addPict']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $allowed = array('gif', 'png', 'jpg');
    
    if(file_exists($_FILES['addPict']['tmp_name'])) {
        if(in_array($imageFileType,$allowed)){
            $sql = "select * from product";
        	$result = mysqli_query($conn,$sql);
        	$count = mysqli_num_rows($result);
        	$num = 10000 + $count +1 ;
        	$prodID = "P".$num;	
        	$date = date('Y-m-d');
        	$type = '';
        	$brand = '';
        	if(isset($_POST['addOtherType'])) {
        	    $type = $_POST['addOtherType']; 
        	}else {
        	    $type = $_POST['addType'];
        	}
        	if(isset($_POST['addOtherBrand'])) {
        	    $brand = $_POST['addOtherBrand']; 
        	}else {
        	    $brand = $_POST['addBrand'];
        	}
        	$sql = "insert into product values('".$prodID."','".$_POST['addProdName']."','".$date."','".$_POST['addProdDur']."','".$_POST['addProdPrice']."',null,'".$_POST['addProdMethod']."',null,'".$_POST['addQuantity']."','".$_POST['addSize']."','".$target_file."','".$brand."','".$_POST['addDelivery']."','".$_POST['addColor']."','".$_POST['addStyle']."','".$_SESSION['id']."',null,'".$type."')";    	
        	$result = mysqli_query($conn,$sql);
        	move_uploaded_file($_FILES['addPict']['tmp_name'], $target_file);
        	
            $sql = "select * from trade";
        	$result= mysqli_query($conn,$sql);
        	$count = mysqli_num_rows($result);
        	$num = 10000 + $count +1 ;
        	$tradeID = "T".$num;	
        	$sql = "insert into trade values('".$tradeID."','".$_SESSION['id']."',null,'".$prodID."','".$_POST['addProdPrice']."','".$date."')";
        	$result = mysqli_query($conn,$sql);
             header("Location: ./insert.php?msg=ok");
        }else {
            // Fail Upload
            header("Location: ./insert.php?msg=fail");
        }
    }
?>