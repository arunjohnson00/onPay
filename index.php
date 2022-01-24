<?php
session_start();
if(isset($_SESSION['id'])){
  header('location:user/userPage.php');
}
?>
<html>
    <head>
    <link rel="icon" type="image/icon" href="logo/logo.ico">
      <title>UserLogin - On Pay</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            body {
  background: #007bff;
  background: linear-gradient(to right, #61a4ff, #76c8fe);
}
.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

.btn-google {
  color: white !important;
  background-color: #ea4335;
}

.btn-facebook {
  color: white !important;
  background-color: #3b5998;
}
.rnd{
    border-radius: 54%;
    width: 147px;
    height: 125px;
}
.logOut {
    background: linear-gradient( 45deg, #0bb1de, #0263ca);
    color: white;
    border: none;
}

.logOut:hover {
    color: rgb(226, 226, 226);
}
.ad-us{
  outline-color: #0d6efd;
    outline-style: auto;
    color: #0263ca;
}
.ad-us:hover{
  background: linear-gradient( 45deg, #0bb1de, #0263ca);
    color: white;
    outline: none;
}
        </style>
    </head>

    <body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body ">
          <center>
          <figure class="figure">
          <div style=" overflow:hidden;" class="pt-2">
          <img src="logo/logo1.png" class="figure-img img-fluid" alt="" id="imge" width="30%">
          </div>
          <figcaption class="figure-caption"></figcaption>
          </figure></center>
            <h5 class="card-title text-center mb-4 mt-2 fw-bold fs-5">User LogIn</h5>
         <form action="user/login_connect.php" method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name@example.com" value="Devanandan">
                <label for="floatingInput">Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" name="regid" placeholder="Password" value="DEV-21012022-051545-339">
                <label for="floatingPassword">Reg-ID</label>
              </div>
              <div class="d-grid">
                <button class="btn logOut btn-login text-uppercase fw-bold" name="signin" type="submit">Sign in</button>
              </div>
              <div class="d-grid mt-3"><a href="admin/adminsignin.php">
                <button class="btn ad-us btn-login text-uppercase fw-bold" name="Admin"  type="button" style="width:100%;">Admin</button></a>
              </div>
              <center>
            <div class='mt-3'>
          <?php 
          if(isset($_GET['status']) || isset($_GET['status'])=='false'){
           echo '<div class="alert alert-danger" role="alert">
            Sign in Failed!
          </div>';
          }
          ?>
        </div>
            </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pt-2">
        <?php
  include('user/footer.php')
?>
     </div>
</body>
</html>