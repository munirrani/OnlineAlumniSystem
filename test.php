<?php


function bookStatus($check_id){
    include_once("php/db_connect.php");
    $alumni_id = 5;
    $book=0;
    $result = mysqli_query($conn, "SELECT * FROM bookmark WHERE ALUMNI_ID=$alumni_id");
    while($res = mysqli_fetch_array($result)){
        $job_id = $res['JOB_ID'];
        if($job_id == $check_id){
            $book++;
        }
    }
    echo $book;
    if($book>0){
        return "bookmarked";
    }
    else{
        return "notBookmarked";
    }
}
echo bookStatus(215);
?>