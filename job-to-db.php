<?php
include_once("php/db_connect.php");
echo '<script>console.log("Running...")</script>';

if(isset($_POST['postJob']) || isset($_POST['editJob'])){
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $job_desc = mysqli_real_escape_string($conn, $_POST['job_desc']);
    $job_type = mysqli_real_escape_string($conn, $_POST['job_type']);
    $job_qual = mysqli_real_escape_string($conn, $_POST['job_qual']);
    $job_salary_min = mysqli_real_escape_string($conn, $_POST['job_salary_min']);
    $job_salary_max = mysqli_real_escape_string($conn, $_POST['job_salary_max']);
    $job_dateline = mysqli_real_escape_string($conn, $_POST['job_dateline']);
    $job_link = mysqli_real_escape_string($conn, $_POST['job_link']);
    $cmp_name = mysqli_real_escape_string($conn, $_POST['cmp_name']);
    $cmp_logo = mysqli_real_escape_string($conn, $_POST['cmp_logo']);
    $cmp_size_min = mysqli_real_escape_string($conn, $_POST['cmp_size_min']);
    $cmp_size_max = mysqli_real_escape_string($conn, $_POST['cmp_size_max']);
    $cmp_about = mysqli_real_escape_string($conn, $_POST['cmp_about']);
    $cmp_address = mysqli_real_escape_string($conn, $_POST['cmp_address']);
    $cmp_postal = mysqli_real_escape_string($conn, $_POST['cmp_postal']);
    $cmp_city = mysqli_real_escape_string($conn, $_POST['cmp_city']);
    $cmp_state = mysqli_real_escape_string($conn, $_POST['cmp_state']);
    $cmp_country = mysqli_real_escape_string($conn, $_POST['cmp_country']);
    $cmp_email = mysqli_real_escape_string($conn, $_POST['cmp_email']);
    $cmp_website = mysqli_real_escape_string($conn, $_POST['cmp_website']);
}

if(isset($_POST['postJob'])) {
    $alumni_id = $_GET['alumni_id'];
    $post_date = date("Y-m-d H:i:s");

    //insert into job table
    $result = mysqli_query($conn, "INSERT INTO job(JOB_TITLE,JOB_DESCRIPTION,JOB_QUALIFICATION,JOB_SALARY_MIN,JOB_SALARY_MAX,JOB_TYPE,JOB_DATELINE,JOB_LINK,CMP_NAME,CMP_LOGO,CMP_ABOUT,CMP_ADDRESS,CMP_POSTAL,CMP_CITY,CMP_STATE,CMP_COUNTRY,CMP_SIZE_MIN,CMP_SIZE_MAX,CMP_EMAIL,CMP_WEBSITE,POST_DATE,EDIT_DATE,ALUMNI_ID) VALUES ('$job_title','$job_desc','$job_qual','$job_salary_min','$job_salary_max','$job_type','$job_dateline','$job_link','$cmp_name','$cmp_logo','$cmp_about','$cmp_address','$cmp_postal','$cmp_city','$cmp_state','$cmp_country','$cmp_size_min','$cmp_size_max','$cmp_email','$cmp_website','$post_date','$post_date','$alumni_id')");

    echo '<script>console.log("Insert success")</script>';

}
else if (isset($_POST['editJob'])){
    $job_id = $_GET['job_id'];
    $edit_date = date("Y-m-d H:i:s");
    
    if(empty($cmp_logo)){
        $result =  mysqli_query($conn, "SELECT CMP_LOGO FROM job WHERE JOB_ID = $job_id");
        $res = mysqli_fetch_array($result);
        $obt_logo = $res['CMP_LOGO'];
        
        $result = mysqli_query($conn, "UPDATE job SET JOB_TITLE='$job_title',JOB_DESCRIPTION='$job_desc',JOB_QUALIFICATION='$job_qual',JOB_SALARY_MIN='$job_salary_min',JOB_SALARY_MAX='$job_salary_max', JOB_TYPE='$job_type',JOB_DATELINE='$job_dateline',JOB_LINK='$job_link',CMP_NAME='$cmp_name',CMP_LOGO='$obt_logo',CMP_ABOUT='$cmp_about',CMP_ADDRESS='$cmp_address',CMP_POSTAL='$cmp_postal',CMP_CITY='$cmp_city',CMP_STATE='$cmp_state',CMP_COUNTRY='$cmp_country',CMP_SIZE_MIN='$cmp_size_min',CMP_SIZE_MAX='$cmp_size_max',CMP_EMAIL='$cmp_email',CMP_WEBSITE='$cmp_website',EDIT_DATE='$edit_date' WHERE JOB_ID='$job_id'");
    }
    else{
        $result = mysqli_query($conn, "UPDATE job SET JOB_TITLE='$job_title',JOB_DESCRIPTION='$job_desc',JOB_QUALIFICATION='$job_qual',JOB_SALARY_MIN='$job_salary_min',JOB_SALARY_MAX='$job_salary_max',JOB_TYPE='$job_type',JOB_DATELINE='$job_dateline',JOB_LINK='$job_link',CMP_NAME='$cmp_name',CMP_LOGO='$cmp_logo',CMP_ABOUT='$cmp_about',CMP_ADDRESS='$cmp_address',CMP_POSTAL='$cmp_postal',CMP_CITY='$cmp_city',CMP_STATE='$cmp_state',CMP_COUNTRY='$cmp_country',CMP_SIZE_MIN='$cmp_size_min',CMP_SIZE_MAX='$cmp_size_max',CMP_EMAIL='$cmp_email',CMP_WEBSITE='$cmp_website',EDIT_DATE='$edit_date' WHERE JOB_ID='$job_id'");
    }
	echo '<script>console.log("Update success")</script>';
}
mysqli_close($conn);
header("location: jobs-activity.php");
?>
