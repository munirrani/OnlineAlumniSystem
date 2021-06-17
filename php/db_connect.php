<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "herokuonline";
  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

  if ($conn->ping()) {
      echo("<script>console.log('Database Connection is Succesfully established!');</script>");
    }

  date_default_timezone_set("Asia/Kuala_Lumpur");
?>