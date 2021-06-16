<?php
include_once("php/db_connect.php");

$alumni_id = $_GET["alumni_id"];
$exp_id = $_GET['exp_id'];
$result = mysqli_query($conn, "DELETE FROM experience WHERE (ALUMNI_ID = $alumni_id AND EXPERIENCE_ID = $exp_id)");

mysqli_close($conn);
?>