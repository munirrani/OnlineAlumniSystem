<?php
include_once('php/db_connect.php');
echo "Running...";

if(isset($_POST['postJob'])) {	
	
    /*$test = mysqli_real_escape_string($conn, $_POST['jobTitleTest']);
    $test1 = mysqli_real_escape_string($conn, $_POST['cmpNameTest']);

	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.*/
	$job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
	$job_desc = mysqli_real_escape_string($conn, $_POST['job_desc']);
	$job_type = mysqli_real_escape_string($conn, $_POST['job_type']);
    $job_qual = mysqli_real_escape_string($conn, $_POST['job_qual']);
	$job_salary_type = mysqli_real_escape_string($conn, $_POST['job_salary_type']);
	$job_salary_min = mysqli_real_escape_string($conn, $_POST['job_salary_min']);
    $job_salary_max = mysqli_real_escape_string($conn, $_POST['job_salary_max']);
	$job_dateline = mysqli_real_escape_string($conn, $_POST['job_dateline']);
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

    $cmp_size = $cmp_size_min." - ".$cmp_size_max;
    echo $cmp_size;

    $result = mysqli_query($conn, "INSERT INTO test (JOB_TITLE,JOB_DESCRIPTION,JOB_QUALIFICATION,JOB_SALARY_MIN,JOB_SALARY_MAX,JOB_SALARY_TYPE,JOB_TYPE,JOB_DATELINE,CMP_NAME,CMP_LOGO,CMP_ABOUT,CMP_ADDRESS,CMP_POSTAL,CMP_CITY,CMP_STATE,CMP_COUNTRY,CMP_EMPLOYEE,,CMP_WEBSITE) VALUES ('$job_title','$job_desc','$job_qual','$job_salary_min','$job_salary_max','$job_salary_type','$job_type','$job_dateline','$cmp_name','$cmp_logo','$cmp_about','$cmp_address','$cmp_postal','$cmp_city','$cmp_state','$cmp_country','$cmp_size','$cmp_email','$cmp_website')");
	//$results = mysqli_query($conn, "INSERT INTO test (jobTitle,cmpName) VALUES ('$test','$test1')");

    //Step 4. Process the results.
    //display success message & the new data can be viewed on index.php
	echo "<font color='green'>Data added successfully.";
	
    //Step 5: Freeing Resources and Closing Connection using mysqli
    mysqli_close($conn);
}
?>
