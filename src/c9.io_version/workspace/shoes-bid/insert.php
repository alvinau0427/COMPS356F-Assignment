<?php
    include_once('heading.php');
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "description" content = "">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
        <!-- Favicon  -->
        <link rel = "icon" href = "img/core-img/favicon.ico">
    
        <!-- Core Style CSS -->
        <link rel = "stylesheet" href = "css/core-style.css">
        <link rel = "stylesheet" href = "style.css">
        
        <style>
            .insert{
            	padding: 50px;
            }
        </style>
    </head>
    
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src = "dist/sweetalert-dev.js"></script>
    <link rel = "stylesheet" href = "dist/sweetalert.css">
    
    <script>
        $(document).ready(function () {
            var msg = GetURLParameter("msg");
            if(msg == "ok") {
                swal("Success!!", "Add Success!!", "success");
            }
            if(msg == "fail") {
                swal("Addition Fail ,\n Image type must be 'gif', 'png' or 'jpg' !", "Add Product Again", "error");
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
    
    <script>
        $(document).ready(function(){
            $('#addBrand').change(function(){
                var brand = $('#addBrand').val();
                if(brand == "other") {
                    document.getElementById('otherBrand').innerHTML='<label>Please Input Your Brand:</label><br/><input class="form-control otherInput" tpye="text" name="addOtherBrand"/>';
                }else{
                    document.getElementById('otherBrand').innerHTML='';
                }
            });
            $('#addType').change(function(){
                var type = $('#addType').val();
                if(type == "other") {
                    document.getElementById('otherType').innerHTML='<label>Please Input Your Type:</label><br/><input class="form-control otherInput" tpye="text" name="addOtherType"/>';
                }else{
                    document.getElementById('otherType').innerHTML='';
                }
            });
            $('.colorPicker').click(function(){
                document.getElementById('colorValue').value = this.id;
                $('.colorPicker').css('border','');
                $(this).css('border','solid 3px burlywood');
                
            });
        });
        
        function readURL(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#addImage')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    
    <body>
        <div class = "insert">
            <h1>List your item</h1><br/>
            <form action = 'insertToDB.php' method = 'post' enctype = 'multipart/form-data'>
                <div class = "row">
                    <div class = "col-12 col-md-6">
                        <div class = "row">
                            <div class = "col-12 mb-3">
                                <label>Product Name</label>
                                <input class = "form-control" type = 'text' name = 'addProdName' required/>
                            </div>
                            
                            <div class = "col-md-6 mb-3">
                                <label>Brand</label>
                                <select class = "wide" id = 'addBrand' name = 'addBrand'>
                                <option value = 'Adidas'>Adidas</option>
                                <option value = 'Nike'>Nike Heels</option>
                                <option value = 'Reebok'>Reebok</option>
                                <option value = 'Converse'>Converse</option>
                                <option value = 'Vanas'>Vanas</option>
                                <option value = 'New Balance'>New Balance</option>
                                <option value = 'other'>Others</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label>Type</label>
                                <select class = "wide" id = 'addType' name = 'addType'>
                                <option value = 'Sneakers'>Sneakers</option>
                                <option value = 'HighHeel'>High Heels</option>
                                <option value = 'Boots'>Boots</option>
                                <option value = 'Sandals'>Sandals</option>
                                <option value = 'Slippers'>Slippers</option>
                                <option value = 'Oxfords'>Oxfords</option>
                                <option value = 'other'>Others</option>
                                </select>
                            </div>
                            
                            <div class = "col-md-6 mb-3">
                                <div id = "otherBrand"/>
                                </div>
                            </div>
                            
                            <div class = "col-md-6 mb-3">
                                <div id = "otherType"/></div>
                            </div>
                            
                            <div class = "col-md-3 mb-3">
                                <label>Duration</label>
                                <input class = "form-control" type = 'text' name = 'addProdDur' placeholder = 'day(s)' required/>
                            </div>
                            
                            <div class = "col-md-3 mb-3">
                                <label>Minimum Price</label>
                                <input class = "form-control" type = 'text' name = 'addProdPrice' required/>
                            </div>
                            
                            <div class = "col-md-3 mb-3">
                                <label>Payment Method</label>
                                <select class = "wide" name = 'addProdMethod'>
                                <option value = 'CreditCard'>Credit Card</option>
                                <option value = 'BankTransfer'>Bank Transfer </option>
                                <option value = 'Cash'>Cash</option>
                                </select>
                            </div>
                            
                            <div class = "col-md-3 mb-3">
                                <label>Delivery Option</label>
                                <select class = "wide" name = 'addDelivery'>
                                <option value = 'Delivery'>By Delivery</option>
                                <option value = 'FaceToFace'>Face To Face</option>
                                </select>
                            </div>
                            
                            <div class = "col-md-3 mb-3">
                                <label>Quantity</label>
                                <input class = "form-control" type = 'number' name = 'addQuantity' min = '1' max = '99' placeholder = "1 to 99" required/>
                            </div>
                            
                            <div class = "col-md-3 mb-3">
                                <label>Size</label>
                                <input class = "form-control" type = 'number' name = 'addSize' min = '3' max = '12' step = '0.5' placeholder = "3 to 12 in UK" required/>
                            </div>
                            
                            <div class = "col-md-3 mb-3">
                                <label>Color</label>
                                <div class = "widget color mb-50">
                                    <div class = "widget-desc">
                                        <ul class = "d-flex">
                                            <li><a href = "#" class = "color1 colorPicker" id = "White"></a></li>
                                            <li><a href = "#" class = "color2 colorPicker" id = "Grey"></a></li>
                                            <li><a href = "#" class = "color3 colorPicker" id = "Black"></a></li>
                                            <li><a href = "#" class = "color4 colorPicker" id = "Blue"></a></li>
                                            <li><a href = "#" class = "color5 colorPicker" id = "Pink"></a></li>
                                            <li><a href = "#" class = "color6 colorPicker" id = "Yellow"></a></li>
                                            <li><a href = "#" class = "color7 colorPicker" id = "Orange"></a></li>
                                            <li><a href = "#" class = "color8 colorPicker" id = "Brown"></a></li>
                                            <li><a href = "#" class = "color9 colorPicker" id = "Green"></a></li>
                                            <li><a href = "#" class = "color10 colorPicker" id = "Purple"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <input class = "form-control" id = "colorValue" type = 'hidden' name = 'addColor' value = "White"/>
                            </div>
                            
                            <div class = "col-md-3 mb-3">
                                <label>Style Code</label>
                                <input class = "form-control" type = 'text' name = 'addStyle' required/>
                            </div>
                        </div>
                    </div>
                    
                    <div class = "col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <h2>Upload your product picture</h2>
                        <br>
                        <div class = "col-12 mb-3">
                            <input class = "form-control" type = 'file' name = 'addPict' id = 'addPict' onchange = 'readURL(this);' required/>
                        </div>
                        <br>
                        <h2>Preview</h2>
                        <div class = "col-12 mb-3">
                            <img id = "addImage" src = "https://placeholder.pics/svg/600x200/DEDEDE/555555/Uploaded%20image%20will%20be%20shown%20here" />
                        </div>
                        <div class = "col-12 mb-3">
                            <input class = "btn essence-btn" type = 'submit' value = 'Add Product'/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <?php
            include_once('footing.php');
        ?>
    </body>
</html>
