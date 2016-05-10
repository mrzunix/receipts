<?php
require('config.php');
$con=mysqli_connect("$dbhost","$dbuser","$dbpassword","$database");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if (!mysqli_set_charset($con, "utf8")) ;
?>
