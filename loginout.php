<?php
session_start();
session_destroy();
header('location:login.php');
?>
<!DOCTYPE html>
<html>
<head><style><?php include 'loin.css' ?></style>
<title>Log Out !.</title>
<link rel="shortcut icon" type="image/png" href="favicon.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
</html>