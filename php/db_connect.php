<?php
$servername = "eu-cdbr-west-01.cleardb.com";
$username = "b4154d122e1a7a";
$password = "4f7ae1f2";
$dbname = "heroku_25bcb2cb4d9b1e8";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>