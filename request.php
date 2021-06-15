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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (
                isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']) 
                && isset($_POST['username']) && isset($_POST['gender'])
                && isset($_POST['enrolYear']) && isset($_POST['gradYear']) && isset($_POST['email']) 
                && isset($_POST['currentPos']) && isset($_POST['level'])
                && isset($_POST['department']) && isset($_POST['address']) && isset($_POST['phonenum']) 
                && isset($_POST['country']) 
                && isset($_POST['postcode']) && isset($_POST['city'])
                && isset($_POST['state']) && isset($_POST['password']) && isset($_POST['confirmpw'])
            ) {

                $firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
                $lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
                $fullname = $firstname . " " . $lastname;
                $age = mysqli_real_escape_string($conn, $_REQUEST['age']);
                $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
                $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
                $enrolYear = mysqli_real_escape_string($conn, $_REQUEST['enrolYear']);
                $gradYear = mysqli_real_escape_string($conn, $_REQUEST['gradYear']);
                $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
                $currentPos = mysqli_real_escape_string($conn, $_REQUEST['currentPos']);
                $level = mysqli_real_escape_string($conn, $_REQUEST['level']);
                $department = mysqli_real_escape_string($conn, $_REQUEST['department']);
                $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
                $phonenum = mysqli_real_escape_string($conn, $_REQUEST['phonenum']);
                $country = mysqli_real_escape_string($conn, $_REQUEST['country']);
                $postcode = mysqli_real_escape_string($conn, $_REQUEST['postcode']);
                $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
                $state = mysqli_real_escape_string($conn, $_REQUEST['state']);
                $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
                $confirmpw = mysqli_real_escape_string($conn, $_REQUEST['confirmpw']);
            }

            


            // Default value
            $reg_status = "Pending";
            $bio = $github_id = $linkedin_id = "";
            //Default image icon
            // Read the image bytes into the $data variable
            $fh = fopen("img/icon.jpg", "r");
            $alumni_img_id = addslashes(fread($fh, filesize("img/icon.jpg")));
            fclose($fh);


            require_once 'php/validation.inc.php';

            if (emptyInputRegister($firstname, $lastname, $username, $email, $password, $confirmpw) !== false) {
                echo "<script>window.location.href = 'register.php?error=emptyinput';</script>";
                exit();
            }
            if (invalidUsername($username) !== false) {
                echo "<script>window.location.href = 'register.php?error=invalidusername';</script>";
                exit();
            }
            if (invalidEmail($email) !== false) {
                echo "<script>window.location.href = 'register.php?error=invalidemail';</script>";
                exit();
            }
            if (pwdMatch($password, $confirmpw) !== false) {
                echo "<script>window.location.href = 'register.php?error=passwordsdontmatch';</script>";
                exit();
            }
            if (usernameExists($conn, $username, $email) !== false) {
                echo "<script>window.location.href = 'register.php?error=usernametaken';</script>";
                exit();
            }

            // Hash Password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Attempt insert query execution
            $sqlreg = "INSERT INTO alumni (EMAIL,USERNAME,PASSWORD,FULL_NAME,
            AGE,GENDER,PHONE_NO,BIO,ADDRESS,COUNTRY,POSTCODE,
            CITY,STATE,REG_STATUS,ALUMNI_IMG,ENROL_YEAR,GRAD_YEAR,CURRENT_POS,
            LEVEL,DEPT,GITHUB_ID,LINKEDIN_ID) 
            VALUES ('$email', '$username', '$hash', '$fullname', '$age', '$gender', '$phonenum', 
            '$bio', '$address', '$country', '$postcode', '$city', 
            '$state', '$reg_status', '$alumni_img_id', '$enrolYear', '$gradYear', '$currentPos', 
            '$level', '$department', '$github_id', '$linkedin_id')";
            mysqli_query($conn, $sqlreg) or die("database error: " . mysqli_error($conn));


            // Close connection
            mysqli_close($conn);
            // echo("<script>console.log(' ".$firstname."');</script>");
        } else {
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