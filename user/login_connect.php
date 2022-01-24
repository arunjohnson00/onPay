<?php
session_start();
include('user_connect.php');
if(isset($_POST['signin'])){
    $username=mysqli_real_escape_string($serv,$_POST['name']);
    $password=mysqli_real_escape_string($serv,$_POST['regid']);
}
$sql="SELECT * FROM mytable WHERE name='".$username."'AND regid='".$password."'";

if($item=mysqli_query($serv,$sql)){
    if(mysqli_num_rows($item)==1){
        while($row=mysqli_fetch_array($item)){
            $_SESSION['id']=$row['id'];
            header('location:userPage.php');
        }
    }
    else {
        header('location:../index.php?status=false');
    }
}
else {
    echo mysqli_error($serv);
}
?>
