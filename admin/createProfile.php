
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
     <div class="row p-0 jsfy-arnd" >
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pay-detail " style="overflow: auto;">

      <form action="create_profile.php" method="post" id="createProfile">
      <center>
        <div class=" mb-3">
                    <h3>Student Details</h3>
                </div>
          <figure class="figure mb-1 mt-1" style="height:100px">
         
          <div style="border-radius: 50%; overflow:hidden;" id="imgboxIMG">
          <input type="file" name='picture' id="uploadIMG" required/>
    <img id="preview" src="../image/profile.svg" style='object-fit: cover;object-position: 50% 50%; width:100px; height:100px;'/>

    </div>
</figure>
<p>Upload Image</p>
</center>
          <div class="row">
              <div class=" mb-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <label for="inputState"><b>Name</b></label>
                <input type="text" class="form-control " name="name" placeholder="Enter Name" autocomplete="off" id="nInput"  required onkeypress="return /[a-z ]/i.test(event.key)">
                <span id="nameStatus"></span>
              </div>
              <div class=" mb-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <label for="inputState"><b>User Name</b></label>
                <input type="text" class="form-control " name="username" placeholder="User Name" id="uInput" required readonly>
                <span id="userStatus"></span>
              </div>
              <div class="form-group mb-3 col-lg-3 col-md-12 col-sm-12 col-12">
              <label for="inputState"><b>Course</b></label>
      <select id="inputState" class="form-control custom-select" name='course'>
        <option selected>Graphic Design</option>
        <option>Web Technology</option>
        <option>Animation</option>
      </select>
              </div>
              <div class=" mb-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
              <label for="inputState"><b>Registration ID</b></label>
                <input type="text" class="form-control" id="floatingPassword" name="regid" placeholder="Registration ID" value="<?php echo "DEV-".date("dmY")."-".date("his")."-".rand(100,999);?>" readonly/>
              </div>
              <div class=" mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
              <label for="inputState"><b>Phone Number</b></label>
                <input type="text" class="form-control"   name="phone" placeholder="Valid Format eg:+91 9446052045" id="pInput" required onkeypress="return /[+0-9 ]/i.test(event.key)"> 
                <span id="phoneStatus"></span>
              </div>
              <div class=" mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
              <label for="inputState"><b>E-mail</b></label>
                <input type="email" class="form-control"  name="email" placeholder="Enter e-mail" id="eInput" autocomplete="off"  required>
                <span id="emailStatus"></span>
              </div>
              <div class=" mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
              <label for="inputState"><b>Address</b></label>
                <textarea rows="3" class="form-control"   name="address" placeholder="Enter Address" autocomplete="off" id="aInput" required></textarea>
                <span id="addressStatus"></span>
              </div>
              </div>
              <div class="d-grid">
                <button class="btn logOut btn-login text-uppercase fw-bold" name="signin" type="submit">Create</button>
              </div>
              <center><div class="pt-3" id="result"><div class="spinner-border text-primary"></div> <span style="vertical-align: super;"><strong> Please Wait...</strong></span></div></center>
            </form>
    </div>
  </div>
</div>


    <?php
    include("inputCheck.php");
    ?>

    <script>
$(function(){
  $('#result').hide();
$('#createProfile').submit(function(e){
  e.preventDefault();
  $('#result').show();
  $.ajax({
    url:'create_profile.php',
    type:'POST',
    data:new FormData(this),
    success:function($signresult){
      $('#result').html($signresult);
    },
    cache:false,
    contentType:false,
    processData:false

  })
})

})

uploadIMG.onchange=()=>{
    if(uploadIMG.files[0]){
preview.src=URL.createObjectURL(uploadIMG.files[0]);
}
}
</script>
<script>
    var input = document.querySelector("#pInput");
    intlTelInput(input, {
      initialCountry: "auto",
      geoIpLookup: function (success, failure) {
        $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
          var countryCode = (resp && resp.country) ? resp.country : "us";
          success(countryCode);
        });
      },
    });
  </script>



