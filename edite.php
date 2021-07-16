<?php
session_start();
if(!isset($_SESSION['paskro']))
{
header('location:login.php');}
include('db/dbconnection.php');
 $br="";
$msg="display:none";
$msgsend="";
$mails=$_SESSION['paskro'];




$sql="SELECT * FROM logindata WHERE email='$mails'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

if(isset($_POST['submit'])){ 
$name=mysqli_real_escape_string($conn,$_POST['fname1']);
$phone=mysqli_real_escape_string($conn,$_POST['phone1']);
$email=mysqli_real_escape_string($conn,$_POST['email1']);
$filesize=$_FILES['image']['size'];
$filename=$_FILES['image']['name'];
$filetype=$_FILES['image']['type'];
$filelen=strlen($_FILES['image']['name']);
if ($filename=="") {
    $filename=$row['imagepath'];
    $filetype='image/png';
    $filesize=1000;
    $filelen=39;
}else{

}
$tsem="SELECT * FROM logindata WHERE email='$mails'";
$tsquery=mysqli_query($conn,$tsem);
$ec=mysqli_num_rows($tsquery);
if ($ec>1) {
$msgsend="This Pepole Is Exist";     
$br="<br><br>";  $msg="display:inline-block";
}
else if ($filesize>1000000) {$msgsend="Size Error";     
  $br="<br><br>";  $msg="display:inline-block";}
else if ($filelen>40) {$msgsend="Name Error";     
  $br="<br><br>";  $msg="display:inline-block";}
else if ($filetype=='image/png' || $filetype=='image/jpg' || $filetype=='image/jpeg'){
$INSERT="UPDATE logindata SET name='$name',email='$email',imagepath='$filename',mobile='$phone'";
mysqli_query($conn,$INSERT);
$target_path = "images/".$filename;
move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
$msgsend="edite. Successful";     
  $br="<br><br>";  $msg="display:inline-block";


}



else{
   $msgsend="Type Not Jpg Jpeg Png Error";     
  $br="<br><br>";  $msg="display:inline-block";
}





}













$sql="SELECT * FROM logindata WHERE email='$mails'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);



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
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="post" enctype="multipart/form-data">
          
            <!-- progressbar -->
            
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Edite Dasbord</h2>


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
                <label for="files"><img id="image" style="border-radius: 50px; cursor: pointer; border: solid #21a8f4 1px; margin: 8px; padding: 4px; width :100px" src ="images/<?php echo$row['imagepath']; ?>">
                </label>
                
            </div>
    <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;">

<span style="color: red;">*</span> Full Name</h2>
                <input type="text" name="fname1" id="fname1" value="<?php echo$row['name']; ?>"  placeholder="Enter Full Name" />
                 
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Mobile Number</h2>
                <input type="number" value="<?php echo$row['mobile']; ?>" name="phone1" id="mobile1" placeholder="Phone" />
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Email</h2>
                <input type="mail" id="email1" value="<?php echo$row['email']; ?>" name="email1" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Enter Email" />
                         
            </fieldset>
  <input type="submit" name="submit" class="action-button" style="background-color:#bc2323;" value="edite now">
           
             
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
 
</body>
</html>
