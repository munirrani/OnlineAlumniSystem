<?php
include_once("php/db_connect.php");

$target_dir = "profileImage/";
$target_file = $target_dir . basename($_FILES["alumni_img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["editProfile"])) {
    if(empty($_FILES["alumni_img"]["name"])){
        if(isset($_POST['editProfile'])){
            
            session_start();
            $alumni_id = $_SESSION["userid"];
            
            $bio = mysqli_real_escape_string($conn, $_POST['bio']);
            $linkedIn = mysqli_real_escape_string($conn, $_POST['linkedIn']);
            $gitHub = mysqli_real_escape_string($conn, $_POST['gitHub']);
            $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
            $current_pos = mysqli_real_escape_string($conn, $_POST['current_pos']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone_no']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $pos_code = mysqli_real_escape_string($conn, $_POST['postcode']);
            $city = mysqli_real_escape_string($conn, $_POST['city']);
            $state = mysqli_real_escape_string($conn, $_POST['state']);
            $country = mysqli_real_escape_string($conn, $_POST['country']);
            $enrol_year = mysqli_real_escape_string($conn, $_POST['enrol_year']);
            $grad_year = mysqli_real_escape_string($conn, $_POST['grad_year']);
            $dept = mysqli_real_escape_string($conn, $_POST['dept']);
            $level = mysqli_real_escape_string($conn, $_POST['level']);
            
            $result = mysqli_query($conn, "UPDATE alumni SET BIO='$bio',LINKEDIN_ID='$linkedIn',GITHUB_ID='$gitHub',EMAIL='$email',FULL_NAME='$fullname',PHONE_NO='$phone',ADDRESS='$address',COUNTRY='$country',POSTCODE='$pos_code',CITY='$city',STATE='$state',ENROL_YEAR='$enrol_year',GRAD_YEAR='$grad_year',CURRENT_POS='$current_pos',LEVEL='$level',DEPT='$dept' WHERE ALUMNI_ID='$alumni_id'");
            }
            header("location: profile.php");
    }else{
        $check = getimagesize($_FILES["alumni_img"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script type='text/javascript'>
                alert('File is not an image.');
                window.location.href='profile-edit.php';
            </script>";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script type='text/javascript'>
                alert('Sorry, file already exists.');
                window.location.href='profile-edit.php';
            </script>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["alumni_img"]["size"] > 500000) {
            echo "<script type='text/javascript'>
            alert('Sorry, your file is too large.');
            window.location.href='profile-edit.php';
            </script>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "<script type='text/javascript'>
                alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                window.location.href='profile-edit.php';
                </script>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script type='text/javascript'>
                alert('Sorry, your file was not uploaded.');
                window.location.href='profile-edit.php';
                </script>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["alumni_img"]["tmp_name"], $target_file)) {

                $image = $_FILES["alumni_img"]["name"];
                if(isset($_POST['editProfile'])){
                    //Update Image       
                    $fh = fopen("profileImage/$image", "r");
                    $alumni_img_id = addslashes(fread($fh, filesize("profileImage/$image")));
                    fclose($fh);
                    
                    session_start();
                    $alumni_id = $_SESSION["userid"];
                    $_SESSION["alumniimg"] = $alumni_img_id;
                    header("Refresh:0");
                    
                    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
                    $linkedIn = mysqli_real_escape_string($conn, $_POST['linkedIn']);
                    $gitHub = mysqli_real_escape_string($conn, $_POST['gitHub']);
                    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                    $current_pos = mysqli_real_escape_string($conn, $_POST['current_pos']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $phone = mysqli_real_escape_string($conn, $_POST['phone_no']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $pos_code = mysqli_real_escape_string($conn, $_POST['postcode']);
                    $city = mysqli_real_escape_string($conn, $_POST['city']);
                    $state = mysqli_real_escape_string($conn, $_POST['state']);
                    $country = mysqli_real_escape_string($conn, $_POST['country']);
                    $enrol_year = mysqli_real_escape_string($conn, $_POST['enrol_year']);
                    $grad_year = mysqli_real_escape_string($conn, $_POST['grad_year']);
                    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
                    $level = mysqli_real_escape_string($conn, $_POST['level']);
                    
                    $result = mysqli_query($conn, "UPDATE alumni SET BIO='$bio',LINKEDIN_ID='$linkedIn',GITHUB_ID='$gitHub',EMAIL='$email',FULL_NAME='$fullname',PHONE_NO='$phone',ADDRESS='$address',COUNTRY='$country',POSTCODE='$pos_code',CITY='$city',STATE='$state',ALUMNI_IMG='$alumni_img_id',ENROL_YEAR='$enrol_year',GRAD_YEAR='$grad_year',CURRENT_POS='$current_pos',LEVEL='$level',DEPT='$dept' WHERE ALUMNI_ID='$alumni_id'");
                }
                header("location: profile.php");
            
            } else {
                echo "<script type='text/javascript'>
                alert('Sorry, there was an error uploading your file.');
                window.location.href='profile-edit.php';
                </script>";
            }
        }
    }
}
?>