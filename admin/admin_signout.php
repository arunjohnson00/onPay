<?php

session_start();

session_destroy();
unset($_COOKIE['user_val']);
setcookie('user_val','',time()+(86400*5),"/");


header('location:adminsignin.php');

?>