<?php
include_once("php/db_connect.php");
$alumni_id = $_GET['alumni_id'];

if(isset($_POST['addExp'])){
    //add new experience database
    $cmp = mysqli_real_escape_string($conn, $_POST['companyName']);
    $work_title = mysqli_real_escape_string($conn, $_POST['workTitle']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);

    $result = mysqli_query($conn, "INSERT INTO experience (COMPANY,WORK_TITLE,POSITION,DESCRIPTION,ALUMNI_ID) VALUES ('$cmp','$work_title','$position','$desc','$alumni_id')");
    echo "success";
}
?>