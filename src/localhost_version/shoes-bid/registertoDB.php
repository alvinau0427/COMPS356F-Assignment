<?php 
	require_once('conn.php');
	extract($_POST);
	
	$sql = "select * from account where userName='".$_POST['userNameReg']."'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) > 0) {
	   header("Location:./index.php?Regeds");
	}else {
		$sql = "select * from account";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		$num = 10000 + $count +1 ;
		$userID = "A".$num;	
		$sql = "insert into account values('".$userID."','".$_POST['userNameReg']."','".$_POST['passwordReg']."','".$_POST['gender']."','".$_POST['DOBReg']."','".$_POST['addressReg']."','".$_POST['phoneReg']."','".$_POST['emailReg']."')";
		$result = mysqli_query($conn, $sql);
		header("Location:./index.php?RegSucc");
	}
?>