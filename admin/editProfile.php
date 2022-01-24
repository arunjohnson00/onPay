<?php
include('user_connect.php');
if(isset($_POST['updateId'])){
    $newId=$_POST['updateId'];
    $selectId="SELECT * FROM mytable WHERE id='$newId'";
    if($myData=mysqli_query($serv,$selectId)){
        while($item=mysqli_fetch_array($myData)){
            $name=$item['name'];
            $phone=$item['phone'];
            $email=$item['email'];
            $image=$item['image'];
            $address=$item['address'];
            $course=$item['course'];
        }
    }
}
?>

<form action="admin_update.php" id="updateProfile" method="post" enctype="multipart/form-data">
<center>
          <figure class="figure mb-1 mt-1 mb-4" style="height:100px">

     
          <div style="border-radius: 50%; overflow:hidden;" id="imgbox">
          <input type="file" name='picture' id="uploaded" />
    <img id="previewed" src="<?php if(empty($image)){ echo "image/profile.svg";}else{ echo "$image";} ?>" style='object-fit: cover;object-position: 50% 50%; width:100px; height:100px;'/>
    <!--<img src="image/upload-image.svg" style="object-fit: cover;object-position: 50% 50%; width:44px; height:44px;position:absolute;top:62px; left:225px;"/>-->
    </div>
</figure>

</center>

<input value="<?php echo $newId ?>" name="id" hidden/>
<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" name="name" placeholder="name" value="<?php echo $name ?>" required onkeypress="return /[a-z ]/i.test(event.key)">
<label for="floatingInput">Name</label>
</div>
<div class="form-floating mb-3">
<input class="form-control" id="floatingInput" name="phone" value="<?php echo $phone ?>" placeholder="+91" required onkeypress="return /[0-9 ]/i.test(event.key)">
<label for="floatingInput">Phone</label>
</div>
<div class="form-floating mb-3">
<input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $email?>" placeholder="name@example.com" required>
<label for="floatingInput">E-mail</label>
</div>

<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" name="address" value="<?php echo $address ?>" placeholder="name" >
<label for="floatingInput">Address</label>
</div>

<div class="form-group mb-3">
              <label for="inputState"><b>Course</b></label>
      <select id="inputState" class="form-control custom-select" name='course'>
        <?php
$selectId="SELECT * FROM payment";
if($myData=mysqli_query($serv,$selectId)){
    while($item=mysqli_fetch_array($myData)){
         if( $course==$item['cource']){
            echo "<option selected>".$item['cource']."</option>";
         }
         else{

            echo "<option>".$item['cource']."</option>";
         }
    }
}
        ?>
      </select>
      
              </div>
<div class="d-grid">
<button class="btn btn-primary btn-login text-uppercase fw-bold"  name="update" type="submit">Update</button>
</div>
<div id="resultUpdate"></div>
</form>
 <script>
$(function(){
  $('#resultUpdate').hide();
$('#updateProfile').submit(function(e){
  e.preventDefault();
  $('#resultUpdate').show();
  $.ajax({
    url:'admin_update.php',
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


uploaded.onchange=()=>{
    if(uploaded.files[0]){
previewed.src=URL.createObjectURL(uploaded.files[0]);
}
}
</script>

