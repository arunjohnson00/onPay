<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:adminsignin.php');
}
?>
<html>
    <head>
    <link rel="icon" type="image/icon" href="../logo/logo.ico">
      <title>Admin Page-OnPay</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bb3047c55a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="../css/style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light pt-4 pb-4">
  <div class="container-fluid">
  <a class="navbar-brand col-xl-1 col-lg-1 col-md-2 col-sm-2 col-2" href="admin_page.php">
    <img src="../logo/logo1.png" width="80%"/>
  </a>
  <ul class="navbar-nav col-xl-8 col-lg-8 col-md-8 col-sm-6 col-6">
      <li class="nav-item active ">
        <h3>Admin Panel</h3>
        <h6>Details</h6>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item ">
       <a href="admin_signout.php"> <button class="btn logOut">LOGOUT</button></a>
      </li>
    </ul>
  </div>
</nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-2 col-lg-2 m-0 p-0 sidebox " id="sidebox">
        <div class="wdfull">
            <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active"  data-toggle="pill" href="#count" id="countbtn" style="border-radius: inherit;" >Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link "   id="detailbtn" data-toggle="pill" href="#detail" style="border-radius: inherit;">Student Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#create" id="createstudents" style="border-radius: inherit;">Create Student</a>
              </li>
              </ul>
        </div>
      </div>
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 pt-3 pr-0">
            <div class="tab-content">
    <div id="count" class=" tab-pane active">
    <?php
          include('count.php');
            ?>
    </div>
    <div id="detail" class=" tab-pane "></div>
    <div id="create" class="tab-pane fade"></div>
    <script>
$(function () {
$("#detailbtn").click(
  function() {
    $("#detail").load("studentDetail.php");
  }
  )

  $("#countbtn").click(
  function() {
  //  $("#count").load("count.php");
   location.reload();
  }
  )



  $("#createstudents").click(
  function() {
    $("#create").load("createProfile.php");
  }
  )




})
      </script>
   
  </div>
            </div>
       
          </div>  
        </div>
        <div>
        </div>


<script>

function reload(){

    location.reload();

}
</script>

<div class="pt-2">
 
  <?php
  include('footer.php');
  ?>
</div>

</body>
</html>