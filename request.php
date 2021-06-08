<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php") ?>
    <title>Request | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php") ?>

        <!-- Thank you for your registration! Your request to join the Alumni Portal has been sent to the Admin. You will be informed through your registered e-mail upon successful processing of your request. -->

        <?php
        include_once("php/db_connect.php");

        if(isset($_POST['firstname'])) {

        $firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
        $fullname = $firstname . " " . $lastname;
        $age = mysqli_real_escape_string($conn, $_REQUEST['age']);
        $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
        $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
        $enrolYear = mysqli_real_escape_string($conn, $_REQUEST['enrolYear']);
        $gradYear = mysqli_real_escape_string($conn, $_REQUEST['gradYear']);
        $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
        $matricid = mysqli_real_escape_string($conn, $_REQUEST['matricid']);
        $currentPos = mysqli_real_escape_string($conn, $_REQUEST['currentPos']);
        $level = mysqli_real_escape_string($conn, $_REQUEST['level']);
        $department = mysqli_real_escape_string($conn, $_REQUEST['department']);
        $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
        $phonenum = mysqli_real_escape_string($conn, $_REQUEST['phonenum']);
        $country = mysqli_real_escape_string($conn, $_REQUEST['country']);
        $postcode = mysqli_real_escape_string($conn, $_REQUEST['postcode']);
        $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
        $state = mysqli_real_escape_string($conn, $_REQUEST['state']);


        // Hash Password
        $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Default value
        $reg_status = "Pending";
        $bio = $github_id = $linkedin_id = $alumni_img_id = "";


        // Attempt insert query execution
        $sqlreg = "INSERT INTO alumni (EMAIL,USERNAME,PASSWORD,FULL_NAME,AGE,GENDER,PHONE_NO,BIO,ADDRESS,COUNTRY,POSTCODE,CITY,STATE,REG_STATUS,ALUMNI_IMG_ID,MATRIC_ID,ENROL_YEAR,GRAD_YEAR,CURRENT_POS,LEVEL,DEPT,GITHUB_ID,LINKEDIN_ID) VALUES ('$email', '$username', '$password', '$fullname', '$age', '$gender', '$phonenum', '$bio', '$address', '$country', '$postcode', '$city', '$state', '$reg_status', '$alumni_img_id', '$matricid', '$enrolYear', '$gradYear', '$currentPos', '$level', '$department', '$github_id', '$linkedin_id')";
        if (mysqli_query($conn, $sqlreg)) {
            echo("<script>console.log('SAVED!');</script>");
        } else {
            echo("<script>console.log('FAILED');</script>");
        }

        // Close connection
        mysqli_close($conn);

        // echo("<script>console.log(' ".$firstname."');</script>");
        }
        else {
            echo "<script>window.location.href = 'register.php';</script>";
        }

        ?>

        <main>
            <div class="request-page shadow-lg">
                <div class="row rowreq">
                    <div class="col d-flex text-center justify-content-center align-items-center">
                        <p class="h3" style="text-transform: uppercase; font-family: 'Hammersmith One', sans-serif;">Thank you for your registration!<br>
                            Your request to join the <span style="color: #8f0b89; font-weight: 800;">Alumni Portal</span> has been sent to the Admin.<br>
                            You will be informed through your registered e-mail upon <span style="color: green; font-weight: 800;">successful acceptance</span> of your request.</p>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once("php/footer.php") ?>
    </div>

    <?php include_once("php/scripts.php") ?>
</body>

</html>