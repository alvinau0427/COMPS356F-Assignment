<?php
    include_once('heading.php');
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src = "dist/sweetalert-dev.js"></script>
        <link rel = "stylesheet" href = "dist/sweetalert.css">
        <link rel = "stylesheet" href = "css/core-style.css">
        <link rel = "stylesheet" href = "css/page/main-button.css">
        
        <script>
            $(document).ready(function () {
                var msg = GetURLParameter("msg");
                if(msg == "RegSucc") {
                    swal("Success!!", "Register Success!!", "success");
                }
                
                if(msg == "IncPW") {
                    swal("Incorrect Password!!", "Login Again", "error");
                }
                
                if(msg == "Reged") {
                    swal("Account had been register", "Register Again", "error");
                }
            });
            
            function GetURLParameter(sParam) {
                var sPageURL = window.location.search.substring(1);
                var sURLVariables = sPageURL.split('&');
                for(var i = 0; i < sURLVariables.length; i++) {
                    var sParameterName = sURLVariables[i].split('=');
                    if(sParameterName[0] == sParam) {
                        return sParameterName[1];
                    }
                }
            }
        </script>
        
        <style>
            textarea {
            	resize:none;
            }
            
            .register {
            	padding: 50px;
            	
            }
        </style>
    </head>
    
    <body>
        <div class = "register">
            <h1>Register your account</h1>
            <br>
            <form action = 'registertoDB.php' method = 'post'>
                <div class = "row">
                    <div class = "col-md-6 mb-3">
                        <label>User Name</label> 
                        <input type = 'text' class = "form-control" name = 'userNameReg' />
                    </div>
                    
                    <div class = "col-md-6 mb-3">
                        <label>Gender</label><br>
                        <select class = "wide" name = "gender">
                            <option value = "M">Male</option>
                            <option value = "F">Female</option>
                        </select>
                    </div>
                    
                    <div class = "col-12 mb-3">
                        <label>Password</label>
                        <input type = 'password' class = "form-control" name = 'passwordReg'/>
                    </div>
                    
                    <div class = "col-12 mb-3">
                        <label>Date of Birth</label>
                        <input type = 'date' class = "form-control" name = 'DOBReg'/>
                    </div>
                    
                    <div class = "col-md-6 mb-3">
                        <label>Phone Number</label>
                        <input class = "form-control" type = 'text' name = 'phoneReg'/>
                    </div>
                    
                    <div class = "col-md-6 mb-3">
                        <label>Email</label>
                        <input class = "form-control" type = 'text' name = 'emailReg'/>
                    </div>
                    
                    <div class = "col-12 mb-3">
                        <label>Address</label>
                        <textarea class = "form-control" rows = '4' cols = '50' name = 'addressReg' placeholder = 'Your address' fixed></textarea>
                    </div>
                    
                    <div class = "col-12 mb-3"><input class = "btn essence-btn" type = 'submit' value = 'Register'/></div>
                </div>
            </form>
        </div>
        
        <?php
            include_once('footing.php');
        ?>
    </body>
</html>