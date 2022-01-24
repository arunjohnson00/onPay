
<div class="col-xl-12 row justify-content-around">
    <div class="col-xl-12 pay-detail"  style="overflow: auto;" >
    <div class="row pt-3 pb-3 jsfy-arnd" >
    <div class='col-12 row justify-content-around pb-3'>
<?php

include('user_connect.php');
$sql="SELECT * FROM mytable";
$i=0;
if($item=mysqli_query($serv,$sql)){
  
    while($row=mysqli_fetch_array($item)){
        $i++;
    }
}
echo "<div class='card flex-row col-xl-4 col-lg-4 boxs stdBox mt-3 justify-content-between align-content-center flex-wrap '>
<div class='d-flex align-content-center flex-wrap'><p class='m-0' ><b>Total Students</b></p></div> 
<div class='d-flex align-content-center flex-wrap'><h2> ".$i."</h2></div>
</div>";


$amont="SELECT SUM(total_paid) FROM mytable";
if($amt=mysqli_query($serv,$amont)){
    while($col=mysqli_fetch_array($amt)){
        echo "<div class='card flex-row col-xl-4 col-lg-4 mt-3 boxs payBox justify-content-between align-content-center flex-wrap '>
        <div class='d-flex align-content-center flex-wrap'><p class='m-0'><b>Total Amount</b></p></div> 
        <div class=''><h2>₹ ".$col['SUM(total_paid)']."</h2></div>
        </div>"; 
    }
}
?>
</div>


<?php
include('detailDigram.php');
?>


<div class='col-12 row justify-content-around pt-5'>
<?php
$courseArray=['Graphic Design','Web Technology','Animation'];
for($k=0;$k<=count($courseArray)-1;$k++){
$sqlcourse="SELECT COUNT('course') AS numCorse FROM mytable WHERE course='$courseArray[$k]'";

if($course=mysqli_query($serv,$sqlcourse)){

    while($courseData=mysqli_fetch_array($course)){
        echo "<div class='card flex-row courseBox col-xl-3 col-lg-3 mt-3 boxs justify-content-between align-content-center flex-wrap '>
        <div class='d-flex align-content-center flex-wrap'><p class='m-0'><b>$courseArray[$k]</b></p></div> 
        <div class='d-flex align-content-center flex-wrap'><h2>".$courseData['numCorse']."</h2></div>
        </div>" ;
    }
}
}
?>
</div>
</div>

</div>

</div>


