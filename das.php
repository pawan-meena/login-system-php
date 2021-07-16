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
                <h2 class="fs-title">Welcome Dasbord</h2>
<img id="imagex" style="border-radius: 50px; cursor: pointer; border: solid #21a8f4 1px; margin: 8px; padding: 4px; width :100px" src ="images/<?php echo$row['imagepath']; ?>">
    <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Full Name</h2>
                <input type="text" name="fname1" id="fname1" value="<?php echo$row['name']; ?>"  placeholder="Enter Full Name" readonly/>
                 
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Mobile Number</h2>
                <input type="number" value="<?php echo$row['mobile']; ?>" name="phone1" id="mobile1" placeholder="Phone" readonly/>
                          <h2 style="font-size: 14px;text-align: left;  padding:0px 0px 8px;    line-height: 21px;
;"><span style="color: red;">*</span> Email</h2>
                <input type="mail" id="email1" value="<?php echo$row['email']; ?>" name="email1" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Enter Email" readonly/>
                         
            </fieldset>
  <a href="loginout.php"><input type="button"class="action-button" style="background-color:#bc2323;" value="loginout"></a>
             <a href="edite.php?up=<?php echo$row['id'];?>"><input type="button"class="action-button" style="background-color:#bc2323;" value="edite now"></a>
               <a href="das.php?de=<?php echo$row['id'];?>"><input type="button"class="action-button" style="background-color:#bc2323;" value="delete now"></a>
             
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
<?php 
if(isset($_GET['de'])){
if ($row['imagepath']!=="IMG_20200616_090810_446.jpg") {
unlink("../images/".$row['imagepath']);
}
$desql="DELETE FROM logindata WHERE id={$_GET['de']}";
$result = mysqli_query($conn, $desql);
session_destroy();
?><script type="text/javascript">window.location.replace("index.php");</script>  <?php
}
?>
