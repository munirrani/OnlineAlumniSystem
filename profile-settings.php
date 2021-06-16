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
        $alumni_id = $_SESSION["userid"];

        $result = mysqli_query($conn, "SELECT * FROM alumni WHERE ALUMNI_ID = $alumni_id");
        while($res = mysqli_fetch_array($result)){
            $alumni_img = $res['ALUMNI_IMG'];
            $username = $res['USERNAME'];
            $email = $res['EMAIL'];
            $bio = $res['BIO'];
            $linkedIn = $res['LINKEDIN_ID'];
            $gitHub = $res['GITHUB_ID'];
            $password = $res['PASSWORD'];
        }

        if(isset($_POST['chgUsername'])){
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $_SESSION["userUsername"] = $username; 
            echo("<meta http-equiv='refresh' content='0'>");
            $result = mysqli_query($conn, "UPDATE alumni SET USERNAME='$username' WHERE ALUMNI_ID='$alumni_id'");
        }
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
                                    <?php
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($alumni_img).'" alt="Admin" id="profileImg" class="shadow"></a>';
                                    ?>
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
                                                        Change username</button>
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
                                                    <?php
                                                        if(isset($_POST['chgPassword'])){
                                                        $result = mysqli_query($conn, "SELECT * FROM alumni WHERE ALUMNI_ID = $alumni_id");
                                                        $res = mysqli_fetch_array($result);
                                                        $password = $res['PASSWORD'];
                                                        
                                                        $curpassword = mysqli_real_escape_string($conn, $_POST['password']);
                                                        if(!password_verify($curpassword, $password)){
                                                            echo '<p style="margin-top: 5px; margin-left: 2px; color:red;">Your current password does not match!</p>';
                                                        }
                                                        $newpassword1 = mysqli_real_escape_string($conn, $_POST['password1']);
                                                        $newpassword2 = mysqli_real_escape_string($conn, $_POST['password2']);
                                                        if($newpassword1 != $newpassword2){
                                                        } 
                                                        if((password_verify($curpassword, $password)) && ($newpassword1 == $newpassword2)){
                                                            $newpassword = password_hash($newpassword2, PASSWORD_DEFAULT);
                                                            $result = mysqli_query($conn, "UPDATE alumni SET PASSWORD='$newpassword' WHERE ALUMNI_ID='$alumni_id'");
                                                            echo '<script>';
                                                            echo 'alert("Your password has been changed");';
                                                            echo '</script>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="newPassModal">
                                                        <h6 class="mt-2 mb-2">New password</h6>
                                                    </label>
                                                </div>
                                                <div class="col-sm-9 text-secondary mt-2 mb-2">
                                                    <input id="password" type="password" class="form-control"
                                                    onkeyup='checkpw()' name="password1" required />
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="newPassConfirmModal">
                                                        <h6 class="mt-2 mb-4">Confirm new password</h6>
                                                    </label>
                                                </div>
                                                <div class="col-sm-9 text-secondary mt-2 mb-4">
                                                    <input id="confirmpw" type="password" class="form-control" onkeyup='checkpw()' name="password2" required/>
                                                    <p style="margin-top: 5px !important; margin-bottom: auto !important;" id="error-text-reg"></p>
                                                    <button name="chgPassword" class="btn confirmbuttonModalSetting" type="submit" style="margin-top: 15px;">Change password</button>
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
                                    <button type="button" class="btn shadow confirmbuttonModalSetting" style="margin-bottom: 20px;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">Delete your
                                        account</button>
                               

                                    <form action="php/logout.php?alumni_id=<?php echo $alumni_id?>" autocomplete="off" method="POST">
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete account?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <div id="deleteAcc" class="alert">
                                                                <span class="closebtn"></span>
                                                                <strong>Warning!</strong> Your account may be deleted.
                                                                <br>You could lose all your account data.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="usernameModalSettings" class="col-form-label">Your username or email:</label>
                                                            <input name="username" type="text" class="form-control purplemodalinput" id="usernameModalSettings" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="verifydelete" class="col-form-label">To verify, type <i>delete my account</i> below:</label>
                                                            <input type="text" class="form-control purplemodalinput" id="verifydelete" pattern="delete my account" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="passwordModalSettings" class="col-form-label">Confirm your password:</label>
                                                            <input name="password" type="password" class="form-control purplemodalinput" id="passwordModalSettings" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" id="cancelbuttonmodal" class="btn confirmbuttonModalSetting" data-bs-dismiss="modal">Cancel</button>
                                                            <button name="delAcc" type="submit" class="btn confirmbuttonModalSetting">Delete this account</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php mysqli_close($conn);?>
    </div>
    <?php include_once("php/footer.php")?>
    <?php include_once("php/scripts.php")?>
    <script type="text/javascript" src="js/register.js"></script>
</body>
</html>