<?php
 include('db/dbconnection.php');
session_start();
session_regenerate_id();
 $br="";
$msg="display:none";
$msgsend="";
if(isset($_POST['submit'])){
$email=mysqli_real_escape_string($conn,$_POST['email']);
$mpassword=mysqli_real_escape_string($conn,$_POST['Password']);
$tsem="SELECT * FROM logindata WHERE email='$email'";
$tsquery=mysqli_query($conn,$tsem);
$tsec=mysqli_num_rows($tsquery);
if ($tsec==1) {
 $emailpass=mysqli_fetch_assoc($tsquery);
 $pass=$emailpass['password'];
$passv=password_verify($mpassword,$pass);
if ($passv==1) {
 $_SESSION['paskro']=$email;
 header('location:das.php');
}else{
   $msgsend="Password Mismatch";     
   $br="<br><br>";  $msg="display:inline-block";}
}else{
   $msgsend="This Email is Not registered ";     
   $br="<br><br>";  $msg="display:inline-block";}
}
?>

















<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    
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
<div class="row">
    <div class="col-md-6 col-md-offset-3">






        <form id="msform" method="post" >
            <a href="login.php"><input type="button"class="action-button" style="background-color:#bc2323;" value="Login"></a>
             <a href="index.php"><input type="button"class="action-button" style="background-color:#bc2323;" value="Sign Up"></a>
            <!-- progressbar -->
            
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">login Now </h2>
  
            
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Enter Email</h2>
                <input type="mail" id="email" name="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Enter Email"/>



                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Enter Password</h2>
                <input type="text" name="Password" id="Password" placeholder="Password"/>

      <a href="restp.php"  style="font-size: 14px;text-decoration: none; color:black;">    <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;">--->>Reset Password</h2>                
 <input type="submit" name="submit" class="action-button" value="submit"/></a>
            </fieldset>
        </form>
        <!-- link to designify.me code snippets -->
       
        <!-- /.link to designify.me code snippets -->
    </div>
</div>


















    <a class="ww" href="https://api.whatsapp.com/send?phone=+917891051612&text=Hello Pawan Bro" target="_blank" ><img src="images/whatsapp.png" width="36px" ></a>





<!-- /.MultiStep Form -->


 <!-- main js-->

</body>
</html>
