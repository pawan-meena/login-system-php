<?php
 include('db/dbconnection.php');
 $br="";
$msg="display:none";
$msgsend="";
if(isset($_POST['submit'])){
$name=mysqli_real_escape_string($conn,$_POST['fname1']);
$phone=mysqli_real_escape_string($conn,$_POST['phone1']);
$email=mysqli_real_escape_string($conn,$_POST['email1']);
$password=mysqli_real_escape_string($conn,$_POST['Password']);
$filesize=$_FILES['image']['size'];
$filename=$_FILES['image']['name'];
$filetype=$_FILES['image']['type'];
$filelen=strlen($_FILES['image']['name']);
$spassword=password_hash($password, PASSWORD_BCRYPT);

if ($filename=="") {
    $filename="IMG_20200616_090810_446.jpg";
    $filetype='image/png';
    $filesize=1000;
    $filelen=39;
}else{

}






$tsem="SELECT * FROM logindata WHERE email='$email'";
$tsquery=mysqli_query($conn,$tsem);
$ec=mysqli_num_rows($tsquery);


if ($ec>0) {
$msgsend="This Pepole Is Exist";     
$br="<br><br>";  $msg="display:inline-block";
}



else if ($filesize>1000000) {$msgsend="Size Error";     
  $br="<br><br>";  $msg="display:inline-block";}



else if ($filelen>40) {$msgsend="Name Error";     
  $br="<br><br>";  $msg="display:inline-block";}






else if ($filetype=='image/png' || $filetype=='image/jpg' || $filetype=='image/jpeg'){




$INSERT="INSERT INTO logindata(name,email,password,imagepath,mobile) 
VALUES('$name','$email','$spassword','$filename','$phone')";




mysqli_query($conn,$INSERT);
$target_path = "images/".$filename;
move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
$msgsend="Reg. Successful";     
  $br="<br><br>";  $msg="display:inline-block";




}



else{
   $msgsend="Type Not Jpg Jpeg Png Error";     
  $br="<br><br>";  $msg="display:inline-block";
}










}




?>















<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    
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










        <form id="msform" method="post" enctype="multipart/form-data">
            <a href="login.php"><input type="button"class="action-button" style="background-color:#bc2323;" value="Login"></a>
             <a href="index.php"><input type="button"class="action-button" style="background-color:#bc2323;" value="Sign Up"></a>
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Personal Details</li>
                <li>Previews</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
<div class="pp">
 <label for="files" class="btn" style="
    cursor: pointer;background: gainsboro; border-radius: 4px;
    padding: 8px;
    margin-top: 11px;
    display: inline-block;
    border: solid #ccc 1px;
    color: #072535;
    font-family: montserrat, arial, verdana;">Select Profile</label>
                <input id="files"  accept="image/gif, image/jpeg, image/png" style="visibility:hidden; display:none" type="file" name="image"/><br>
                <label for="files"><img id="image" style="border-radius: 50px; cursor: pointer; border: solid #21a8f4 1px; margin: 8px; padding: 4px; width :100px" src ="images/IMG_20200616_090810_446.jpg">
                </label>
                
            </div>
            <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Full Name</h2>
                <input type="text" name="fname" id="fname"  placeholder="Enter Full Name" required/>
                 
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Mobile Number</h2>
                <input type="number" name="phone" id="mobile" placeholder="Phone"/>
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Email</h2>
                <input type="mail" id="email" name="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Enter Email"/>



                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span>  Password</h2>
                <input type="text" name="Password" id="Password" placeholder="Password"/>

                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Confirm Password</h2>
                <input type="text" name="Cpassword" id="Cpassword" placeholder="Confirm Password"/>
 <input type="button" name="next" class="next sx action-button" value="Next"/>
            </fieldset>





            <fieldset>
                <h2 class="fs-title">PREVIEWS</h2>
<img id="imagex" style="border-radius: 50px; cursor: pointer; border: solid #21a8f4 1px; margin: 8px; padding: 4px; width :100px" src ="images/IMG_20200616_090810_446.jpg">
    <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Full Name</h2>
                <input type="text" name="fname1" id="fname1"  placeholder="Enter Full Name" readonly/>
                 
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Mobile Number</h2>
                <input type="number" name="phone1" id="mobile1" placeholder="Phone" readonly/>
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Email</h2>
                <input type="mail" id="email1" name="email1" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Enter Email" readonly/>
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span>  Password</h2>
                <input type="text" name="Password1" id="Password1" placeholder="Password" readonly/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="submit"/>
            </fieldset>

        </form>
        <!-- link to designify.me code snippets -->
       
        <!-- /.link to designify.me code snippets -->
    </div>
</div>


















    <a class="ww" href="https://api.whatsapp.com/send?phone=+917891051612&text=Hello Pawan Bro" target="_blank" ><img src="images/whatsapp.png" width="36px" ></a>





<!-- /.MultiStep Form -->









<script type="text/javascript">
$("#files").change(function() {
  filename = this.files[0].name
});
    document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
         document.getElementById("imagex").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
 <!-- main js-->
 <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
