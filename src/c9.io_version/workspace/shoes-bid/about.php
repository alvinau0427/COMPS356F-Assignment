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
        <!-- The above 4 meta tags *must* come first in the head; Any other head content must come *after* these tags -->
    
        <!-- Favicon  -->
        <link rel = "icon" href = "img/core-img/favicon.ico">
    
        <!-- Core Style CSS -->
        <link rel = "stylesheet" href = "css/core-style.css">
        <link rel = "stylesheet" href = "style.css">
    </head>

    <body>
        <div class = "contact-area d-flex align-items-center">
            <div class = "google-map">
                <!-- <div id="googleMap"></div> -->

                <iframe src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.0086268838027!2d114.1783911928053!3d22.31551349104047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400c4dc1fe28b%3A0xb77dffe746233e69!2sOUHK+Jockey+Club+Campus!5e0!3m2!1szh-TW!2shk!4v1541754648431"
                    width = "100%" height = "650" frameborder = "0" style = "border:0" allowfullscreen>
                </iframe> 
            </div>
    
            <div class = "contact-info">
                <h3>How to contact with us</h3>
                <p>Find us in The Open Iniversity of Hong Kong</p>
    
                <div class = "contact-address mt-20">
                    <p><span>Address: </span> 81 Chung Hau Street, Ho Man Tin, Kowloon</p>
                    <p><span>Telephone: </span> (+852) 2711 - 2100</p>
                    <p><span>E-mail: </span> essence@ouhk.edu.hk</p>
                    <p>If you know of a bidding or abuse problem with any of Essence's services, we'd like to hear about it right away.</p>
                </div>
            </div>
        </div>
        
        <!-- Google Maps API -->
        <script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
        <script src = "js/map-active.js"></script>
        
        <?php
            include_once('footing.php');
        ?>
    </body>
</html>
