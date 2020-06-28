 <?php
    require_once('conn.php');
    extract($_POST);
    include_once('heading.php');
    $sql = "select * from product where productName like '%".$_POST['search']."%' or type like '%".$_POST['search']."%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dayplus = abs(strtotime(date('Y-m-d')) - strtotime($row['postDate']));
            $day = $row['productDur'] - ($dayplus / 86400);
            $form =
<<<EOD
            <div class="col-3">
                <div class="itemBox text-left">
                    <div><image src=%s></div>
                    <div class="itemText">
                        <div class="text-right">Days: %s</div>
                        <div>Name: %s</div>
                        <div>$%s</div>
                    </div>
                </div>
            </div>
EOD;

            if($day < 0) {
                continue;
            }
            
            if(isset($row['curPrice'])) {
                printf($form,$row['photoPath'],$day,$row['productName'],$row['curPrice']);
            }else {
                printf($form,$row['photoPath'],$day,$row['productName'],$row['miniPrice']);
            }
        }
    }else {
        echo '<label>No result</label>';
    }
?>