<?php
include_once("php/db_connect.php");

$alumni_id = $_GET['alumni_id'];
$job_id = $_GET['job_id'];
$result = mysqli_query($conn, "DELETE FROM job WHERE JOB_ID = $job_id WHERE ALUMNI_ID=$alumni_id");
mysqli_close($conn);
?>