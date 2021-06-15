<?php
include_once("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <title>Settings | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php");
        $alumni_id = 225;
        
        if(isset($_POST['chgUsername'])){
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $result = mysqli_query($conn, "UPDATE alumni SET USERNAME='$username' WHERE ALUMNI_ID='$alumni_id'");
        }
        if(isset($_POST['chgPassword'])){
            $query = mysql_query("SELECT PASSWORD FROM alumni WHERE ALUMNI_ID='$alumni_id");
            $data = mysql_fetch_assoc($query);
            if($data != md5($_POST['password'])){
                echo "Old and new password did not match!";
            }
            if($_POST['password1'] != $_POST['password2']){
                echo("Oops! Password did not match! Try again. ");
            } 
            if(($data == md5($_POST['password'])) && ($_POST['password1'] == $_POST['password2'])){
                $password = mysqli_real_escape_string($conn, $_POST['password2']);
                $result = mysqli_query($conn, "UPDATE alumni SET PASSWORD='$password' WHERE ALUMNI_ID='$alumni_id'");
            }
        }
        if(isset($_POST['delAcc'])){
            $query = mysql_query("SELECT * FROM alumni WHERE ALUMNI_ID='$alumni_id");
            while($res = mysqli_fetch_array($query)){
                $username = $res['USERNAME'];
                $email = $res['EMAIL'];
                $password = $res['PASSWORD'];
            }
            if(($username != $_POST['username']) || ($email != $_POST['username'])){
                echo "Your username or email did not match!";
            }
            if($password != md5($_POST['password'])){
                echo("Oops! Password did not match! Try again!");
            } 
            if((($username != $_POST['username']) || ($email != $_POST['username'])) && ($password != md5($_POST['password']))){
                $result = mysqli_query($conn, "DELETE FROM alumni WHERE ALUMNI_ID='$alumni_id'");
            }
        }
        $result = mysql_query("SELECT * FROM alumni WHERE ALUMNI_ID='$alumni_id");
        while($res = mysqli_fetch_array($result)){
            $alumni_img = $res['ALUMNI_IMG'];
            $username = $res['USERNAME'];
            $bio = $res['BIO'];
            $linkedIn = $res['LINKEDIN_ID'];
            $gitHub = $res['GITHUB_ID'];
            $password = $res['PASSWORD'];
        }
        mysqli_close($conn);
        ?>

        <main>
            <div class="container mt-3">
                <ul class="nav nav-tabs">
                    <li id="inactive" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li id="inactive" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link active" aria-current="page"
                            href="profile-settings.php">Settings & Privacy</a>
                    </li>
                    <li id="profileNav" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="jobs-activity.php">Job Activity</a>
                    </li>
                    <li id="profileNav" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="jobs-bookmark.php">Bookmarks</a>
                    </li>
                </ul>
            </div>

            <div class="container" style="margin-top: 20px;">
                <div class="main-body">
                    <div id="round-corner-left" class="row gutters-sm shadow-lg">
                        <div class="col-md-4 mb-3">
                            <div class="card-body mt-3">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="img/<?php echo $alumni_img?>" alt="Admin" id="profileImg"
                                            class="shadow">
                                    <div class="mt-3">
                                        <h2 class="profile-name" id="userName1"><?php echo $username?></h2>
                                        <div class="container">
                                            <div class="container">
                                                <p id="bio1">
                                                    <?php 
                                                    if(empty($bio)){
                                                        echo "Add bio and social media";
                                                    }
                                                    else{
                                                        echo $bio;
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="container">
                                                <a id="linkedin1" href="<?php echo $linkedIn?>" target="_blank"><img src="img/linkedin.png" alt="LinkedIn"
                                                        id="bio-icons-prof"></a>
                                                <a id="github1" href="<?php echo $gitHub?>" target="_blank"><img src="img/github.png" alt="Github"
                                                        id="bio-icons-prof"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="right-col" class="col-md-8">
                            <div id="right-col" class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <h2 id="profile-heading">SETTINGS AND PRIVACY</h2>
                                    </div>
                                    <div class="row">
                                        <h5 class="mb-0" style="font-weight: bold;">Change username</h5>
                                    </div>
                                    <hr>
                                    <button type="button" class="collapsible">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0" style="font-weight: bold">Username</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <h6 class="mb-0" id="userName2"><?php echo $username?></h6>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="content mb-35">
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="userName">
                                                    <h6 class="mt-2 mb-4">New username</h6>
                                                </label>
                                            </div>
                                            <div class="col-sm-9 text-secondary mt-2 mb-4">
                                                <form method="POST" action="profile-settings.php">
                                                    <input name="username" type="text" class="form-control purplemodalinput"
                                                        id="userName" required>
                                                    <button name="chgUsername" class="btn confirmbuttonModalSetting" type="submit"
                                                        style="margin-top: 15px">
                                                        Confirm username</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5 class="mb-0" style="font-weight: bold;">Change password</h5>
                                    </div>
                                    <hr>
                                    <button type="button" class="collapsible">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0" style="font-weight: bold">Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <h6 class="mb-0" style="font-weight: bolder;">. . . . . . . . . .</h6>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="content mb-35">
                                        <hr>
                                        <form action="profile-settings.php" method="POST">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="currentPass">
                                                        <h6 class="mt-2 mb-4">Current password</h6>
                                                    </label>
                                                </div>
                                                <div class="col-sm-9 text-secondary mt-2 mb-2">
                                                    <input name="password" type="password" class="form-control" placeholder="" required/>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="newPassModal">
                                                        <h6 class="mt-2 mb-2">New password</h6>
                                                    </label>
                                                </div>
                                                <div class="col-sm-9 text-secondary mt-2 mb-2">
                                                    <input id="password" type="password" class="form-control"
                                                        name="password1" required />
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="newPassConfirmModal">
                                                        <h6 class="mt-2 mb-4">Re-enter password</h6>
                                                    </label>
                                                </div>
                                                <div class="col-sm-9 text-secondary mt-2 mb-4">
                                                    <input id="confirmpw" type="password" class="form-control" name="password2" required/>
                                                    <button name="chgPassword" class="btn confirmbuttonModalSetting" type="submit" style="margin-top: 15px;">Confirm password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <h5 class="mb-0" style="font-weight: bold;">Delete account</h5>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h6 style="margin-bottom: 20px;">Please be certain before you delete your
                                            account. </h6>
                                    </div>
                                    <button type="button" class="btn shadow confirmbuttonModalSetting"
                                        style="margin-bottom: 20px;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">Delete your
                                        account</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want
                                                        to delete account?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="index.php" autocomplete="off" method="POST">
                                                        <div class="mb-3">
                                                            <div id="deleteAcc" class="alert">
                                                                <span class="closebtn"></span>
                                                                <strong>Warning!</strong> Your account may be deleted.
                                                                <br>You could lose all your account data.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="usernameModalSettings"
                                                                class="col-form-label">Your username or email:</label>
                                                            <input name="username" type="text" class="form-control purplemodalinput"
                                                                id="usernameModalSettings" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="verifydelete" class="col-form-label">To verify,
                                                                type <i>delete my account</i> below:</label>
                                                            <input type="text" class="form-control purplemodalinput"
                                                                id="verifydelete" pattern="delete my account" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="passwordModalSettings"
                                                                class="col-form-label">Confirm your password:</label>
                                                            <input name="password" type="password" class="form-control purplemodalinput"
                                                                id="passwordModalSettings" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" id="cancelbuttonmodal"
                                                                class="btn confirmbuttonModalSetting"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button name="delAcc" type="submit" class="btn confirmbuttonModalSetting">Delete this account</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php include_once("php/footer.php")?>
    <script>
        /*
        function deleteAcc() {
            let loggedin = false;
            sessionStorage.setItem("loggedin", loggedin);
            window.location.href = "index.html";
        }
        function confirmChange() {
            var a = document.getElementById("userName").value;
            if (a !== "") {
                sessionStorage.setItem("userName", a);
                document.getElementById("userName1").innerHTML = a;
                document.getElementById("userName2").innerHTML = a;
            }
        }
        document.getElementById("bio1").innerHTML = sessionStorage.getItem("bio");
        document.getElementById("userName1").innerHTML = sessionStorage.getItem("userName");
        document.getElementById("userName2").innerHTML = sessionStorage.getItem("userName");

        document.getElementById("linkedin1").setAttribute("href", sessionStorage.getItem("linkedin"));
        document.getElementById("github1").setAttribute("href", sessionStorage.getItem("github"));

        // Function to check Whether both passwords
        // is same or not.
        function checkPassword(form) {
            password1 = form.password1.value;
            password2 = form.password2.value;

            if (password1 != password2) {
                alert("\nNew password did not match: Please try again.")
                return false;
            }

            // If same return True.
            else {
                alert("Your password is changed")
                return true;
            }
        }*/
    </script>
    

    <?php include_once("php/scripts.php")?>
    <script type="text/javascript" src="js/register.js"></script>
</body>

</html>