<?php
include('user_connect.php');
    $id=mysqli_real_escape_string($serv,$_POST['payid']);
    $sqla="SELECT * FROM mytable WHERE id='".$id."'";
if($item=mysqli_query($serv,$sqla)){
  while($row=mysqli_fetch_array($item)){
    $paid= $row['total_paid'];
    $totalamt=$row['course_amount'];
    $user_name=$row['name'];
  }}
     $pay=$paid+$_POST['payamount'];
     $bal=$totalamt-$pay;
    $sqlnew="UPDATE mytable SET total_paid='$pay' WHERE id='$id'";
    if(mysqli_query($serv,$sqlnew)){
        header('location:userPage.php');
    }else{
       // echo mysqli_error($serv);
       // echo 'error';
    }
   $paidn= mysqli_real_escape_string($serv,trim($_POST['payamount']));
    $newPay="INSERT INTO pay_tabe(userid,total_amount,paid_amount,balance_amount) VALUES('$id','$totalamt','$paidn','$bal')";
    if(mysqli_query($serv,$newPay)){
        $x='You have a Payment from '.$user_name.'!, Paid Amount: ₹'.$paidn.', Balance Amount: ₹'.$bal;
        $post = array(
          'user' => 'devanandan120',
          'text' => $x
      );
      $ch = curl_init();
      $endpoint="http://api.callmebot.com/text.php";
      $url = $endpoint . '?' . http_build_query($post);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
        header('location:userPage.php');
    }
    else {
        //echo 'error';
       // echo mysqli_error($serv);
    }
?>


