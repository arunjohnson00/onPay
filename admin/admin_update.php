<?php
session_start();
include('user_connect.php');
//if(isset($_POST['update'])){
    echo '<div id="waiting"><div class="spinner-border text-primary"></div> <span style="vertical-align: super;"><strong> Please Wait...</strong></span></div>';
    $id= $_POST['id'];
    $name=mysqli_real_escape_string($serv,ucwords(trim($_POST['name'])));
    $email=mysqli_real_escape_string($serv,trim($_POST['email']));
    $phone=mysqli_real_escape_string($serv,trim($_POST['phone']));
    $address=mysqli_real_escape_string($serv,trim($_POST['address']));
    $course=mysqli_real_escape_string($serv,trim($_POST['course']));
    $uperror=1;
    if( empty($name) || empty($phone) ||  empty($email) ||  empty($address)  ||  empty($course)){
        $uperror=0;
        echo "<i class='fas fa-exclamation text-danger'> </i><i class='text-danger'> Please fill all fields</i><br>";
    }
    $mobileregex = "/^[+][0-9]{1,3}[ ][0-9]{10}$/" ;  
if (!preg_match($mobileregex, $phone)) {
   // echo "<p><i class='fas fa-check text-success'></i> <i class='text-success'>Phone Number is Valid</i></p>";
   echo "<i class='fas fa-exclamation text-danger'> </i><i class='text-danger'>Phone number is not in a valid format eg: +91 9446052045</i><br>";
   $uperror=0;
}

$nameregex = "/[a-z ]/i" ;  
if (!preg_match($nameregex, $name)) {
   // echo "<p><i class='fas fa-check text-success'></i> <i class='text-success'>Phone Number is Valid</i></p>";
   echo "<i class='fas fa-exclamation text-danger'> </i><i class='text-danger'>Name is not in a valid format. Use Alphabets</i><br>";
   $uperror=0;
}

$regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

if (!preg_match($regex, $email)) {
 //echo "<i class='fas fa-check text-success'></i> <i class='text-success'> Email is Valid</i>";  
 echo "<i class='fas fa-exclamation text-danger'> </i><i class='text-danger'> Please use correct Email format eg: demo@domain.com</i><br>";
   $uperror=0;
} 

    $selectedId="SELECT * FROM payment WHERE cource='$course'";
    if($myData=mysqli_query($serv,$selectedId)){
        while($item=mysqli_fetch_array($myData)){
             $amount=$item['amount_total'];
        }
    }
    $selecteData="SELECT * FROM mytable WHERE id='$id'";
    if($seleData=mysqli_query($serv,$selecteData)){
        while($itemData=mysqli_fetch_array($seleData)){
            $oldimage=$itemData['image'];

            
        }}
if(empty($oldimage)||$oldimage=='image/'|| $oldimage==""){

    $locations='image/';
    $filelocations=$locations.basename($_FILES['picture']['name']);
}
  
else{


    $filelocations=$oldimage;
}

    if($uperror!==0){
    $sqlnew="UPDATE mytable SET name='$name',email='$email',phone='$phone',address='$address',course='$course',course_amount='$amount',image='$filelocations' WHERE id='$id'";

    if(mysqli_query($serv,$sqlnew)){
        move_uploaded_file($_FILES['picture']['tmp_name'],$filelocations);
       // header('location:admin_page.php?updateProfile=true');
      
    

 $to = $email;
 $subject = " Account has been successfully updated ";
 
 $message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
 
 <head>
     <script src="https://kit.fontawesome.com/bb3047c55a.js" crossorigin="anonymous"></script>
 
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="x-apple-disable-message-reformatting">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
     </script>
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
     <title></title>
 
     <style type="text/css">
         table,
         td {
             color: #000000;
         }
         
         a {
             color: #0000ee;
             text-decoration: underline;
         }
         
         @media (max-width: 480px) {
             #u_content_text_7 .v-text-align {
                 text-align: center !important;
             }
             #u_content_text_8 .v-text-align {
                 text-align: center !important;
             }
         }
         
         @media only screen and (min-width: 620px) {
             .u-row {
                 width: 600px !important;
             }
             .u-row .u-col {
                 vertical-align: top;
             }
             .u-row .u-col-50 {
                 width: 300px !important;
             }
             .u-row .u-col-100 {
                 width: 600px !important;
             }
         }
         
         @media (max-width: 620px) {
             .u-row-container {
                 max-width: 100% !important;
                 padding-left: 0px !important;
                 padding-right: 0px !important;
             }
             .u-row .u-col {
                 min-width: 320px !important;
                 max-width: 100% !important;
                 display: block !important;
             }
             .u-row {
                 width: calc(100% - 40px) !important;
             }
             .u-col {
                 width: 100% !important;
             }
             .u-col>div {
                 margin: 0 auto;
             }
         }
         
         body {
             margin: 0;
             padding: 0;
         }
         
         table,
         tr,
         td {
             vertical-align: top;
             border-collapse: collapse;
         }
         
         p {
             margin: 0;
         }
         
         .ie-container table,
         .mso-container table {
             table-layout: fixed;
         }
         
         * {
             line-height: inherit;
         }
     </style>
     <link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet" type="text/css">
 
 </head>
 
 <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ecf0f1;color: #000000">
     <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ecf0f1;width:100%" cellpadding="0" cellspacing="0">
         <tbody>
             <tr style="vertical-align: top">
                 <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
 
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                 <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:6px;" align="left">
 
                                                             <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                 <tbody>
                                                                     <tr style="vertical-align: top">
                                                                         <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                             <span>&#160;</span>
                                                                         </td>
                                                                     </tr>
                                                                 </tbody>
                                                             </table>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
 
 
 
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                 <div class="u-col u-col-50" style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
 
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px 10px; " align="left">
 
                                                             <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                 <tr>
                                                                     <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
 
                                                                         <img align="center" border="0" src="https://demo.onebytech.com/onpay/logo/logo1.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 41%;max-width: 114.8px;"
                                                                             width="114.8" />
 
                                                                     </td>
                                                                 </tr>
                                                             </table>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="u-col u-col-50" style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:25px 10px 10px; " align="left">
 
                                                             <div class="v-text-align" style="line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><em><span style="color: #aaaaaa; font-size: 16px; line-height: 22.4px;"><strong><span style="line-height: 22.4px; font-size: 16px;"><span style="color: #34495e; font-size: 16px; line-height: 22.4px;">'.date("l j").'</span></span></strong></span></em></p>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
 
 
                                         </div>
 
                                     </div>
                                 </div>
 
 
                             </div>
                         </div>
                     </div>
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #fffbfb;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #fffbfb;">
                                 <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:6px; " align="left">
                                                             <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                 <tbody>
                                                                     <tr style="vertical-align: top">
                                                                         <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                             <span>&#160;</span>
                                                                         </td>
                                                                     </tr>
                                                                 </tbody>
                                                             </table>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                 <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
 
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px 20px; " align="left">
                                                             <div class="v-text-align" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-family: Cabin, sans-serif; font-size: 14px; line-height: 19.6px;"><strong><span style="font-size: 22px; line-height: 30.8px; color: #000000;">Account updated </span></strong>
                                                                     </span>
                                                                 </p>
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-family: Cabin, sans-serif; font-size: 14px; line-height: 19.6px;"><span style="font-size: 22px; line-height: 30.8px; color: #000000;">By, Admin</span></span>
                                                                 </p>
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-family: Cabin, sans-serif; font-size: 14px; line-height: 19.6px;"><span style="font-size: 22px; line-height: 30.8px; color: #000000;"></span></span>
                                                                 </p>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
 
 
 
                                 <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
 
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:10px; " align="left">
 
                                                             <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                 <tr>
                                                                     <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
 
                                                                         <img align="center" border="0" src="https://demo.onebytech.com/onpay/'.$filelocations.'" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 25%;max-width: 145px;"
                                                                             width="145" />
 
                                                                     </td>
                                                                 </tr>
                                                             </table>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                 <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 2px; " align="left">
 
                                                             <div class="v-text-align" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 18px; line-height: 25.2px;"><strong><span style="line-height: 25.2px; font-size: 18px;">'.$name.'</span></strong>
                                                                     </span>
                                                                 </p>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 10px; " align="left">
 
                                                             <div class="v-text-align" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 14px; line-height: 19.6px;">'.$course.' Student</span></p>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
 
 
 
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                 <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:10px; " align="left">
 
                                                             <div align="center">
                                                                 <div style="display: table; max-width:131px;">
                                                                     <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 12px">
                                                                         
                                                                     </table>
                                                                 </div>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
 
 
 
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                 <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 33px 15px; " align="left">
 
                                                             <div class="v-text-align" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 16px; line-height: 22.4px; font-family: Cabin, sans-serif;">Email : '.$email.' </span></p>
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 16px; line-height: 22.4px; font-family: Cabin, sans-serif;"> Registration ID : <b> '.$pass.'</b> </span></p>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
 
 
                                         </div>
 
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
 
 
 
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
 
 
 
                                 <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
 
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px; " align="left">
 
                                                             <div class="v-text-align" align="center">
 
                                                                 <a href="" target="_blank" style="box-sizing: border-box;display: inline-block; text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #3367bb; border-radius: 19px;-webkit-border-radius: 19px; -moz-border-radius: 19px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                                                                     <button style="border-radius: 5px;
                                                                     border: none;
                                                                     background: royalblue;
                                                                     color: whitesmoke;
                                                                     padding: 8px 13px;"><span style="font-size: 18px; line-height: 21.6px; "><strong><span style="line-height: 21.6px; font-size: 18px;">Sign In</button></strong>
                                                                     </span>
                                                                     </span>
                                                                 </a>
 
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
 
 
                                         </div>
 
                                     </div>
                                 </div>
 
 
                             </div>
                         </div>
                     </div>
 
 
 
                     <div class="u-row-container" style="padding: 0px;background-color: transparent">
                         <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #2d529d;">
                             <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
 
 
 
                                 <div class="u-col u-col-50" style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
 
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
 
                                             <table id="u_content_text_7" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:23px 60px 20px; " align="left">
 
                                                             <div class="v-text-align" style="line-height: 160%; text-align: left; word-wrap: break-word;">
                                                                 <p style="font-size: 14px; line-height: 160%;"><span style="  font-size: 14px; line-height: 22.4px;"><strong><span style="line-height: 22.4px; color: #ffffff; font-size: 14px;">Respectfully,</span></strong>
                                                                     </span>
                                                                 </p>
                                                                 <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 14px; line-height: 22.4px;   color: #ffffff;">Devanandan V R</span></p>
                                                                 <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 14px; line-height: 22.4px;   color: #ffffff;">Developer</span></p>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
 
 
                                         </div>
 
                                     </div>
                                 </div>
 
 
                                 <div class="u-col u-col-50" style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                     <div style="width: 100% !important;">
 
                                         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
 
 
                                             <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:25px 10px 10px; " align="left">
 
                                                             <div align="center">
                                                                 <div style="display: table; max-width:179px;">
 
 
 
 
                                                                 </div>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
 
                                             <table id="u_content_text_8" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                 <tbody>
                                                     <tr>
                                                         <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 10px 20px; " align="left">
 
                                                             <div class="v-text-align" style="line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                 <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 14px; line-height: 19.6px; color: #ffffff;">dave38892@gmail.com</span></p>
                                                             </div>
 
                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </td>
             </tr>
         </tbody>
     </table>
 </body>
 
 </html>';
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: dave38892@gmail.com' . "\r\n";
$headers .= 'Cc: dave38892@gmail.com,arunjohnson00@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);




//Telegram
$x='Account has been updated for '.$name.', Email: '.$email.', Phone Number: '.$phone.', Course: '.$course.', Address: '.$address;

$post = array(
  'user' => 'devanandan120',
  'text' => $x
);

$ch = curl_init();
$endpoint="http://api.callmebot.com/text.php";
$url = $endpoint . '?' . http_build_query($post);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

     

?>
   
       <script>
       setTimeout(function() {
         $("#waiting").remove();


       }
       , 300);
       

    </script>


  <?php
  sleep(2);
  echo '<div class="text-success" id="proUpdaate">
  <strong> Profile has been updated. Please wait....</strong>
  </div>'; 

  ?>

<script>
          
       
       
       

          setTimeout(function() {
  $("proUpdaate").remove();
  window.location.href="admin_page.php";
}
, 3000);

    </script>

<?php
    }
    else{
        echo mysqli_error($serv);
    }
    }
//}
?>