<?php
    require_once('conn.php');
    session_start();
    extract($_POST);
    
    $sql = "select * from account where userName='".$_POST['userName']."'" ;
    $result = mysqli_query($conn, $sql);
    
    // $count = mysqli_num_rows($result);
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {  
            $userID = $row['userID'];
            $username = $row['userName'];        
            $pw = $row['password'];
        }
        
        if($pw == $_POST['password']) {
            $_SESSION['id']=$userID;
            $_SESSION['user'] = $username;
            $result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {                
                    mysqli_close($conn);
                }
            }
            header("Location:./index.php?msg=true");
        }else {
            // Incorrect Password
            header("Location: ./index.php?msg=IncPW");
        }
    }else {
    	// No Account 
    	header("Location: ./index.php?msg=NoAC");
    }
?>