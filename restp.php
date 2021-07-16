<?php
include('db/dbconnection.php');
$br="";
$msg="display:none";
$msgsend="";
$pp="";
$ppp="none";
if(isset($_POST['submit'])){

if (mysqli_real_escape_string($conn,$_POST['email1'])!=="") {
$email=mysqli_real_escape_string($conn,$_POST['email1']);
$tsem="SELECT * FROM logindata WHERE email='$email'";
$tsquery=mysqli_query($conn,$tsem);
$row=mysqli_fetch_array($tsquery);
if ($row['email']!==$email) {
$msgsend="This inncrect email";     
$br="<br><br>";  $msg="display:inline-block";
}

else{$pp="none";
$ppp="";
}

}
}
if(isset($_POST['submitp'])){echo "string";
$password=mysqli_real_escape_string($conn,$_POST['Password']);
$spassword=password_hash($password, PASSWORD_BCRYPT);
$INSERT="UPDATE logindata SET password='$spassword'";
mysqli_query($conn,$INSERT);
header('location:login.php');
}






?>


<!DOCTYPE html>
<html>
<head>
    <title>dasbord</title>
    
 <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">  
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
 <!-- main css-->
 <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="text-align: center;">
<!-- MultiStep Form -->
<header><img src="images/logo.jpg" width="50px"><p>Design by pawan</p></header>



 <?php echo$br;?><span style="text-align: center; font-size:20px;padding:10px;<?php echo$msg;?>;color:white;background: black;"><?php echo$msgsend;?></span>


<div class="row" style="display: <?php echo$pp;?>">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="post" enctype="multipart/form-data">
            <!-- progressbar -->
            
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">reset Password</h2>
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Email</h2>
                <input type="mail" id="email1"  name="email1" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Enter Email" />         
            </fieldset>
  <input type="submit" name="submit" class="action-button" style="background-color:#bc2323;" value="submit">
        </form>




</div></div>







<div class="row" style="display: <?php echo$ppp;?>">
    <div class="col-md-6 col-md-offset-3">

  <form id="msform" method="post" enctype="multipart/form-data" class="<?php echo$pp ?>">
       
            <fieldset>
                <h2 class="fs-title">reset Password</h2>
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span>reset Password</h2>
                <input type="text" id="email1"  name="Password"  placeholder="password" />         
            </fieldset>





  <input type="submit" name="submitp" class="action-button" style="background-color:#bc2323;" value="submit">
        </form>


</div></div>







    <a class="ww" href="https://api.whatsapp.com/send?phone=+917891051612&text=Hello Pawan Bro" target="_blank" ><img src="images/whatsapp.png" width="36px" ></a>


<!-- /.MultiStep Form -->








 <!-- main js-->
 
</body>
</html>
