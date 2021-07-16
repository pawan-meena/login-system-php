<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "users";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
mysqli_set_charset($conn,'utf8');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>