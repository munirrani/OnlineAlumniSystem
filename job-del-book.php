<?php
include_once("php/db_connect.php");

$alumni_id = 5;
$job_id = $_GET['job_id'];
$result = mysqli_query($conn, "DELETE FROM bookmark WHERE (ALUMNI_ID = $alumni_id AND JOB_ID = $job_id )");

mysqli_close($conn);
?>