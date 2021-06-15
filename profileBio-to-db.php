<?php
include_once("php/db_connect.php");

//$alumni_img = mysqli_real_escape_string($conn, $_POST['ALUMNI_IMG']);
$alumni_id=$_GET['alumni_id'];
$linkedIn=$_GET['linkedIn'];
$gitHub=$_GET['gitHub'];

$result = mysqli_query($conn, "UPDATE alumni SET BIO='$bio',GITHUB_ID='$gitHub',LINKEDIN_ID='$linkedIn' WHERE ALUMNI_ID='$alumni_id'");

mysqli_close($conn);
?>