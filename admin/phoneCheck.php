<?php
include('user_connect.php');

$checkPhone= $_POST['checkphone'];
$sqlUser="SELECT * FROM mytable WHERE phone='$checkPhone'";

if($itemPhone=mysqli_query($serv,$sqlUser)){
    if(mysqli_num_rows($itemPhone)>0){
        echo "<i class='fas fa-exclamation text-danger'> </i><i class='text-danger'> This number already existed.</i>";
    }
    else{
        $mobileregex = "/^[+][0-9]{1,3}[ ][0-9]{10}$/" ;  
        if (preg_match($mobileregex, $checkPhone)) {
            echo "<p><i class='fas fa-check text-success'></i> <i class='text-success'>Valid phone number</i></p>";
        }
        else{
            echo "<i class='fas fa-exclamation text-danger'> </i><i class='text-danger'> Not in valid format eg: +91 9446052045</i>";
        }
    }
}

?>