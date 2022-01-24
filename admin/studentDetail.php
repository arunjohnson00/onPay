
<div class="col-xl-12">
    <div class="row p-0 jsfy-arnd" >
        <div class="col-xl-12 pay-detail"  style="overflow: auto;" >
        <div class=" mt-2 ">
<form action="search_connect.php" method="post" id="search" class="jsty_ctr m-0">
<input class="input1 form-control  pl-2" id="floatingInput" name="searchinput" placeholder="Search Students by Name" />
<button class="btn btn-primary mybtn" name="search" type="submit">Search</button>
</form>
<center><div id="datadelete" class="pb-3"><?php
if(isset($_GET['updateProfile'])){
echo "<div class='text-success'><b>Profile has been updated. Please wait....</b></div>";
}
?></div>

<script>
$(window).on('load', function() {
    if(window.location.toString().includes("updateProfile")){
setTimeout(RedirectMeURL, 3000);
function RedirectMeURL() {
console.log("checked");
window.location.href = 'admin_page.php';
}
}
})
</script>
</center>
</div>
<div id="datasearch"><?php include('students_view.php');?></div>
  <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header jsfy-ctr">
               <!--  <h4>Update Profile</h4> -->
                </div> 
                <div class="modal-body">
                <div id="dataUpdate"></div> 
                </div>
            </div>
        </div>
    </div>
                  </div>
               </div>
            </div>
            <script>
$(function(){

$("#search").submit(function(e){

e.preventDefault();

$.ajax({  
    type: "POST",  
    url: "search_connect.php",  
    data: $(this).serialize(),  
    success: function(value) {  
            $("#datasearch").html(value);
    }
});
})

})
            </script>