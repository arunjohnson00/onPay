<?php
session_start();
if(isset($_SESSION['admin'])){
  header('location:admin_page.php');
}

?>
<html>
    <head>
    <link rel="icon" type="image/icon" href="../logo/logo.ico">
      <title>Admin Login-OnPay</title>
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
          <img src="../logo/logo1.png" class="figure-img img-fluid" alt="" id="imge" width="30%">
          </div>
  <figcaption class="figure-caption"></figcaption>
</figure></center>
              
            <h5 class="card-title text-center mb-4 mt-2 fw-bold fs-5">Admin LogIn</h5>
           
            <form action="admin_connect.php" method="post">
              
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name" value="admin" required>
                <label for="floatingInput">Admin Name</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password" value="password" required>
                <label for="floatingPassword">Password</label>
              </div>
              <div class="d-grid">
                <button class="btn logOut btn-login text-uppercase fw-bold" name="submit" type="submit">Sign In</button>
              </div>
              <div class="d-grid mt-3"><a href="../index.php">
                <button class="btn ad-us btn-login text-uppercase fw-bold" type="button" style="width:100%;">USER</button></a>
              </div>
            </form>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pt-2">
        <?php
  include('footer.php')
?>
     </div>
</body>
</html>