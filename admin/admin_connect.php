<?php
session_start();
if(isset($_POST['submit'])){
    $username=$_POST['name'];
    $pass=md5($_POST['pass']);
    }
    include('user_connect.php');
$sql="SELECT * FROM admin_table WHERE username='".$username."' AND password='".$pass."'";
if($item=mysqli_query($serv,$sql)){
    if(mysqli_num_rows($item)==1){
        while($row=mysqli_fetch_array($item)){
            $_SESSION['admin']=$row['id'];
setcookie('user_val',md5($_SESSION['admin']),time()+(86400*5),"/");
            header('location:admin_page.php');
        }
    }
    else {
        header('location:adminsignin.php?status=false');
    }
}
else{
    echo mysqli_error($serv);
}

?>