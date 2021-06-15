<?php
include_once("php/db_connect.php");

$alumni_id = 5;
$job_id = $_GET['job_id'];
$result = mysqli_query($conn, "DELETE FROM job WHERE JOB_ID = $job_id");

mysqli_close($conn);
?>