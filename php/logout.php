<?php

session_start();
session_unset();
session_destroy();
echo "<script>sessionStorage.setItem('loggedin', 'false');</script>";

include_once("delete-acc.php");
header("location: ../index.php");
?>