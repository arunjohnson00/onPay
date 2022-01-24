<?php

if(!isset($_SESSION['id'])){
  session_start();
}
include('user_connect.php');
$id=$_SESSION['id'];

$sql="SELECT * FROM mytable WHERE id='".$id."'";

if($item=mysqli_query($serv,$sql)){
  while($row=mysqli_fetch_array($item)){
    $cor= $row['course'];
  }
}

$selectId="SELECT * FROM payment WHERE cource='$cor'";
        if($myData=mysqli_query($serv,$selectId)){
            while($item=mysqli_fetch_array($myData)){
                 echo $amount=$item['amount_total'];
            }
        }

?>
