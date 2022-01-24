<script>

//INPUT CHECK

//Email
$("#eInput").keyup(function(){

 var checkEmail= $(this).val();

 $.ajax({
    url:'emailCheck.php',
    type:'POST',
    data:{checkEmail:checkEmail},
    success:function(emailStatus){
      $('#emailStatus').html(emailStatus);
    }
  })
  
})

//User
$("#uInput").keyup(function(){

var checkUser= $("#uInput").val();

$.ajax({
   url:'userCheck.php',
   type:'POST',
   data:{checkUser:checkUser},
   success:function(userStatus){
     $('#userStatus').html(userStatus);
   }
 })
 
})

//Phone
$("#pInput").keyup(function(){

var checkphone= $("#pInput").val();

$.ajax({
   url:'phoneCheck.php',
   type:'POST',
   data:{checkphone:checkphone},
   success:function(phoneStatus){
     $('#phoneStatus').html(phoneStatus);
   }
 })
 
})

$("#nInput").change(function(){

var checkEmail= $("#nInput").val();
if($("#nInput").val()!==""){
$("#uInput").val(checkEmail.toLowerCase().replaceAll(/\s/g,'')+Math.floor(Math.random(2)*1000))
}
 
})
</script>