<html>

<head>
    <title>Payment Success -OnPay</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/bb3047c55a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script> 
</head>
<body style="    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    align-content: center;">
    <center><h3 id='txt'>Please Wait...</h3>
    <a href="userPage.php">
    <button class='btn btn-primary mt-3' style="display: none;" id="mybtn">Go Back</button></a></center>
    <script>
        setTimeout(myGreeting, 5000);
function myGreeting() {

  $('button').css("display", "block");
}
$(document).ready(function(){
$('#txt').delay(1000).fadeOut(function(){
    $('#txt').html("Proccessing...<div class='spinner-border text-primary'></div>").fadeIn().delay(2000).fadeOut(function(){


        $('#txt').html("<p style='color:green;'>✅Your payment has been completed.</p>").fadeIn();
    })

});

});
    </script>
</body>
</html>