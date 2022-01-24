<?php

session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}

$id=$_SESSION['id'];
include('user_connect.php');
$sql="SELECT * FROM mytable WHERE id='".$id."'";

if($item=mysqli_query($serv,$sql)){
  while($row=mysqli_fetch_array($item)){
    $idin= $row['id'];
    $name= $row['name'];
    $image= $row['image'];
    $email= $row['email'];
    $phone= $row['phone'];
    $address= $row['address'];
    $course= $row['course'];
    $tpay= $row['total_paid'];
  }
}

?>
<html>
<link rel="icon" type="image/icon" href="../logo/logo.ico">
  <title>User Dashboard - OnPay</title>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bb3047c55a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script> 
    
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="../css/style.css" type="text/css" rel="stylesheet" />
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light pt-4 pb-4">
  <div class="container-fluid">
  <a class="navbar-brand col-xl-1 col-lg-1 col-md-2 col-sm-2 col-2" href="userPage.php">
    <img src="../logo/logo1.png" width="80%"/>
  </a>
  <ul class="navbar-nav col-xl-8 col-lg-8 col-md-8 col-sm-6 col-6">
      <li class="nav-item active ">
        <h3>Money Payment</h3>
        <p>Welcome to pay</p>
      </li>
    </ul>
  <div class=" " >
    
    <ul class="navbar-nav col-xl-1 col-lg-1 col-md-2 col-sm-2 col-2">
      <li class="nav-item ">
       <a href="signout_connect.php"> <button class="btn logOut">LOGOUT</button></a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<div class="container-fluid">

          <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 m-0 pl-0 pr-0 pt-4 sidebox " id="sidebox">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
              
            <center>
          <figure class="figure">
          <div style="border-radius: 50%; overflow:hidden;">
  <img src="<?php echo $image ?>" class="figure-img img-fluid" alt="" id="img">
          </div>
  <figcaption class="figure-caption"></figcaption>
  </figure></center>
                 <div class="optin pl-3">
                 <i class="fas fa-user icn"></i>
                 <p class=" wth m-0 pl-3"><?php echo $name ?></p>
                 </div>

                 <div class="optin pl-3">
                 <i class="fas fa-envelope icn"></i>
                 <p class=" wth m-0 pl-3" style="text-transform: none;"><?php echo $email ?></p>
                 </div>

                 <div class="optin pl-3">
                 <i class="fas fa-mobile icn"></i>
                 <p class="wth m-0 pl-3"><?php echo $phone ?></p>
                 </div>

                 <div class="optin pl-3">
                 <i class="fas fa-address-card icn"></i>
                 <p class="wth m-0 pl-3"><?php echo $address ?></p>
                 </div>

                 <div class="optin pl-3">
                 <i class="fas fa-id-badge icn"></i>
                 <p class="wth m-0 pl-3"><?php echo $course ?></p>
                 </div>
            </div>

                 <div class="edit pb-3 pt-3">
   <button type="button" class="btn logOut edtbtn" data-toggle="modal" data-target="#myModal">Edit</button> <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header jsfy-ctr">
                 <h4>Update Account</h4> 
                </div> 
                <div class="modal-body">

            <form id="updateProfile" action="update_connect.php" method="post" enctype="multipart/form-data" >
            <center>
          <figure class="figure">
         
          <div style="border-radius: 50%; overflow:hidden;" id="imgbox">
          <input type="file" name='picture' id="uploads" />
  <img src="<?php echo $image ?>" class="figure-img img-fluid" alt="" id="imge">
          </div>
  <figcaption class="figure-caption"></figcaption>
  </figure></center>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name" value="<?php echo $name ?>" required onkeypress="return /[a-z ]/i.test(event.key)">
                <label for="floatingInput">Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $email ?>" placeholder="name@example.com" required>
                <label for="floatingInput">E-mail</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="phone" value="<?php echo $phone ?>" placeholder="+91" required onkeypress="return /[0-9+ ]/i.test(event.key)">
                <label for="floatingInput">Phone</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="address" value="<?php echo $address ?>" placeholder="name" >
                <label for="floatingInput">Address</label>
              </div>
              <div class="d-grid">
                <button class="btn logOut btn-login text-uppercase fw-bold" name="update" type="submit">Update</button>
              </div>
              <div id="resultUpdate"></div>
            </form>
                </div>
            </div>
        </div>
  </div>
                 </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 pdg">
               <div class="row p-0 jsfy-arnd" >
                  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-11 col-11 pay-detail overflow pt-3" >
                      <div class="table-responsive">
                  <table class="table table-striped table-hover">
    <thead>
      <tr class="clr">
        <th>Payment Id</th>
        <th>Paid Amount</th>
        <th>Balance Amount</th>
        <th>Payment Time</th>
      </tr>
    </thead>
    <tbody class="clr1">
      <?php

      $paydetail="SELECT * FROM pay_tabe WHERE userid='$id'";

      if($detail=mysqli_query($serv,$paydetail)){
        while($paymenttable=mysqli_fetch_array($detail)){
          
          $b=$paymenttable['balance_amount'];
          if($b<=0){
            $b=0;
            ?>
            <script>
              $(document).ready(function(){
              $("#paybtn").prop("disabled",true);
              $("#pay2").css("display","block");
            })
            </script>
            <?php
          }
         $pd= $paymenttable['paid_amount'];
          echo "<tr>
          <td>".$paymenttable['id']."</td>
          <td>".$paymenttable['paid_amount']."</td>
          <td id='no1'>".$paymenttable['balance_amount']."</td>
          <td>".$paymenttable['r_time']."</td>
          </tr>";
        }
        
      }
      ?>
    </tbody>
    
  </table>
  </div>
  <div class="alert alert-success" role="alert" style="display: none;" id="pay2"> You Have Paid Full Amount</div>

                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-11 col-11 pay-details p-0">
                    <div class="jsfy-ctr r-sidebox col-xl-12 pt-4 pb-3">
                    <h4>Payment</h4>
                    </div>
                    <div class='pt-2'>
                      <center><p>Course Amount</p><h4> ₹ <?php
                      include('payment_connect.php');
                      ?></h4></center>
                      
                    </div>
                    <div class='pt-2'>
                      <center><p>Balance Amount</p><h4> ₹ <?php
                     echo $b;
                      ?></h4></center>
                      
                    </div>

                    <div class='pt-2'>
                      <center><p>Paid Amount</p><h4> ₹ <?php
                    
      $paydetailpaid="SELECT * FROM mytable WHERE id='$id'";

      if($detailpaid=mysqli_query($serv,$paydetailpaid)){
        while($paymenttablepaid=mysqli_fetch_array($detailpaid)){
          
      
      echo $paymenttablepaid['total_paid'];
          
        }
        
      }
      ?>
                      </h4></center>
                      
                    </div>
                    <div class="pay pt-3">
                      <div class="edit pb-3">


  <div class="container">
    <button type="button" class="btn logOut edtbtn" data-toggle="modal" data-target="#myPay" >Pay-Now</button> <!-- The Modal -->
    <div class="modal fade" id="myPay">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header jsfy-ctr">
                 <h4>Pay Amount</h4> 
                </div> 
                <div class="modal-body">

            <form action="pay_connect.php" method="post" id="pyForm">
            <div class="form-floating">
                <input type="text" name="payid" value="<?php echo $idin ?>" hidden>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="paymentAMT" name="payamount" placeholder="Amount"  required onkeypress="return /[0-9]/i.test(event.key)">
                <label for="floatingInput">Amount</label>
              </div>
              <div class="d-grid">
                <button class="btn logOut btn-login text-uppercase fw-bold" data-amount="" name="Pay"  type="submit" id="paybtn">Pay</button>
              </div>
              
            </form>
                </div>
            </div>
        </div>
    </div>
  </div>

<script>



  $('body').on('click', '#paybtn', function(e){

    $(this).attr("data-amount",$('#paymentAMT').val())
    var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var options = {
    "key": "rzp_live_ko7LmXXckYvLHD",
    "amount": (totalAmount*100), // 2000 paise = INR 20
     "name": "OnPay-Devanandan",
    "description": "Fee Payment System",
    "image": "../logo/logo1.png",
    "handler": function (response){
          $.ajax({
            url: 'pay_connect.php',
            type: 'post',
            data:$("#pyForm").serializeArray(), 
            success: function (msg) {

              window.location.href = 'success.php';
               


            }
        });
     
    },

    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();
  });


var no=$("#no1").val();
if(no<=0){
$("#paybtn").style.display="none";
}
</script>

                    </div>
               </div>
               </div>
               
            </div>

          </div>  

        </div>
       


        <div>
          <?php 
          
          if(isset($_GET['update']) || isset($_GET['update'])=='ok'){
           echo '<div class="alert alert-success" role="alert">
            This is a success alert with <a href="#" class="alert-link" id="a1">an example link</a>. Give it a click if you like.
          </div>';
          }

          ?>
        </div>

        <script>
         
$(function(){
  $('#resultUpdate').hide();
$('#updateProfile').submit(function(e){
  e.preventDefault();
  $('#resultUpdate').show();
  $.ajax({
    url:'update_connect.php',
    type:'POST',
    data:new FormData(this),
    success:function($signresult){
      $('#resultUpdate').html($signresult);
    },
    cache:false,
    contentType:false,
    processData:false

  })
})

})
        setTimeout(() => {
            document.querySelector('#a1').style.display='none';
          },2000);


          uploads.onchange=()=>{
    if(uploads.files[0]){
imge.src=URL.createObjectURL(uploads.files[0]);
}
}
</script>
      

        </div>
     <div class="pt-2">
        <?php
  include('footer.php')
?>
     </div>

 
</body>

</html>
