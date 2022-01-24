<?php
include('user_connect.php');

$email= $_POST['checkEmail'];
$sqlEmail="SELECT * FROM mytable WHERE email='$email'";

if($item=mysqli_query($serv,$sqlEmail)){
    if(mysqli_num_rows($item)>0){
        echo "<i class='fas fa-exclamation text-danger'> </i><i class='text-danger'> This email already existed.</i>";
    }
    else{

        $regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if (preg_match($regex, $email)) {
         echo "<i class='fas fa-check text-success'></i> <i class='text-success'> Email is available</i>";  
        } else { 
           echo "<i class='fas fa-exclamation text-danger'> </i><i class='text-danger'> Please use correct format eg: demo@domain.com</i>";
      }
       
    }
    
}

?>