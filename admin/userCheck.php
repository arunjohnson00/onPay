<?php
include('user_connect.php');

$checkUser= $_POST['checkUser'];
$sqlUser="SELECT * FROM mytable WHERE username='$checkUser'";

if($itemUser=mysqli_query($serv,$sqlUser)){
    if(mysqli_num_rows($itemUser)==1){
        echo "<i class='text-danger'>Already Exist</i>";
    }
    else{
        echo "<i class='text-success'>Not Exist</i>";
    }
}

?>