<?php
include_once("db_connect.php");


$alumni_id = $_GET['alumni_id'];
$job_id = $_GET['job_id'];

//add bookmark
if($_GET['do'] == "addB"){
    $book_date = date("Y-m-d H:i:s");
    $result = mysqli_query($conn, "INSERT INTO bookmark (ALUMNI_ID,JOB_ID,BOOK_DATE) VALUES ('$alumni_id','$job_id','$book_date')");
}

//delete bookmark
else if($_GET['do'] == "delB"){
    $result = mysqli_query($conn, "DELETE FROM bookmark WHERE (ALUMNI_ID = $alumni_id AND JOB_ID = $job_id)");
    $result2 = mysqli_query($conn, "SELECT * FROM bookmark WHERE ALUMNI_ID = $alumni_id");
    $book_count = mysqli_num_rows($result2);

    echo $book_count;
}
//delete Post
else if($_GET['do'] == "delP"){
    $result = mysqli_query($conn, "DELETE FROM job WHERE JOB_ID = $job_id");
    $result2 = mysqli_query($conn, "SELECT * FROM job WHERE ALUMNI_ID = $alumni_id");
    $act_count = mysqli_num_rows($result2);

    echo $act_count;
}

mysqli_close($conn);
?>