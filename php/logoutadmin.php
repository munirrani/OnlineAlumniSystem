<?php

session_start();
session_unset();
session_destroy();
// echo "<script>sessionStorage.setItem('loggedin', 'false');</script>";

header("location: ../index.php");
?>