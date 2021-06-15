<?php
include_once("php/db_connect.php");


$book_date = date("Y-m-d H:i:s");
$alumni_id = 5;
$job_id = $_GET['job_id'];
$result = mysqli_query($conn, "INSERT INTO bookmark (ALUMNI_ID,JOB_ID,BOOK_DATE) VALUES ('$alumni_id','$job_id','$book_date')");


mysqli_close($conn);
?>