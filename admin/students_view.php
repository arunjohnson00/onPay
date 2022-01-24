
<div class="table-responsive">
   <table class="table table-hover">
  
    <thead>
      <tr class="clr">
        <th>No.</th>
        <th style="position: sticky;left: 0;z-index:99;background:white">Name</th>
        <th>phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Course</th>
        <th>Course Payment</th>
        <th>Total Paid</th>
        <th><button class="btn btn-primary" type="button" id="reload" onClick="reload()"><i class="fas fa-redo"></i></i></button></th>
      </tr>
    </thead>
    
        <?php 
echo "<tbody class='clr1'>"; 
include('user_connect.php');

$sql="SELECT * FROM mytable";

if($item=mysqli_query($serv,$sql)){
    $Formcount=0;
    while($row=mysqli_fetch_array($item)){

        $Formcount++;
        echo'<tr>
        <td>'.$Formcount.'</td>
        <td style="position: sticky;left: 0;z-index:99;background:white">'.$row["name"].'</td>
        <td>'.$row["phone"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["address"].'</td>
        <td>'.$row["course"].'</td>
        <td>'.$row["course_amount"].'</td>
        <td>'.$row["total_paid"].'</td>
        <td>
        <form id="updateForm'.$Formcount.'" class="p-0 m-0">
        <input name="updateId" value="'.$row["id"].'" hidden/>
        <button type="submit"  id="getBtn" name="edit" class="btn btn-primary edtbtn" data-toggle="modal" data-target="#myModal" onClick="updateURL()"><i class="fas fa-user-edit"></i></button></form></td>
        <td>
        <form id="deleteForm'.$Formcount.'" class="p-0 m-0">
        <input name="deleteId" value="'.$row["id"].'" hidden/>
        <button class="btn btn-outline-danger edtbtn" type="submit"><i class="fas fa-trash-alt"></i></button>
        </form>
        </td>
      </tr>';
      ?>


<script>

$(function(){

$("#updateForm<?php echo $Formcount;?>").submit(function(e){

e.preventDefault();

var str = $("#updateForm<?php echo $Formcount;?>").serializeArray();
$.ajax({  
    type: "POST",  
    url: "editProfile.php",  
    data: str,  
    success: function(value) {  
            $("#dataUpdate").html(value);
    }
});
})

});


$(function(){

$("#deleteForm<?php echo $Formcount;?>").submit(function(e){

e.preventDefault();

var str = $("#deleteForm<?php echo $Formcount;?>").serializeArray();
$.ajax({  
    type: "POST",  
    url: "deleteProfile.php",  
    data: str,  
    success: function(value) {  
            $("#datadelete").html(value);
    }
});
})

});

 
 </script>
<?php

    }
    echo "</tbody>";
}
?>
  </table>
</div>