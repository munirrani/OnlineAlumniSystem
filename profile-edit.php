<?php
include_once("php/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <?PHP

    if (!isset($_SESSION["userid"])) {
        header("location: index.php");
    }
    if (isset($_SESSION["admin"])) {
        header("location: admindash.php");
    }

    ?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <title>FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php");
    
        $alumni_id = $_SESSION["userid"];
        $result = mysqli_query($conn, "SELECT * FROM alumni WHERE ALUMNI_ID = $alumni_id");

        while($res = mysqli_fetch_array($result)){
            $alumni_img = $res['ALUMNI_IMG'];
            $username = $res['USERNAME'];
            $bio = $res['BIO'];
            $linkedIn = $res['LINKEDIN_ID'];
            $gitHub = $res['GITHUB_ID'];
            $fullname = $res['FULL_NAME'];
            $current_pos = $res['CURRENT_POS'];
            $email = $res['EMAIL'];
            $phone = $res['PHONE_NO'];
            $address = $res['ADDRESS'];
            $pos_code = $res['POSTCODE'];
            $city = $res['CITY'];
            $state = $res['STATE'];
            $country = $res['COUNTRY'];
            $enrol_year = $res['ENROL_YEAR'];
            $grad_year = $res['GRAD_YEAR'];
            $dept = $res['DEPT'];
            $level = $res['LEVEL'];
        }    
    ?>  
    <main>
        <div class="container mt-3">
            <ul class="nav nav-tabs">
                <li id="inactive" class="nav-item">
                    <a id="profileNav-inactive" class="nav-link active" aria-current="page"
                        href="profile.php">Profile</a>
                </li>
                <li id="inactive" class="nav-item">
                    <a id="profileNav-inactive" class="nav-link" href="profile-settings.php">Settings & Privacy</a>
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
            <form enctype="multipart/form-data" action="profile-to-db.php" method="POST">
                <div id="round-corner-left" class="row gutters-sm shadow-lg">
                    <div class="col-md-4 mb-3">
                        <div class="card-body mt-3">
                            <div class="d-flex flex-column align-items-center text-center" id="result">
                                <div class="profile-pic-div">
                                    <?php
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($alumni_img).'" alt="Admin" id="photo" class="shadow">';
                                    ?>
                                    <input type="file" name="alumni_img" id="file" onchange="loadfile(event)">
                                    <label for="file" id="uploadBtn">Change Photo</label>
                                </div>
                                <div class="mt-3">
                                    <h2 class="profile-name" id="userName1"></h2>
                                    <div class="container">
                                        <div class="container">
                                            <textarea name="bio" class="form-control mb-3" id="bio" placeholder="Add a Bio"><?php echo $bio?></textarea>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><img src="img/linkedin.png" alt="LinkedIn" id="bio-icons"></span>
                                                </div>
                                                <input name="linkedIn" type="url" class="form-control" id="linkedin" placeholder="LinkedIn" value="<?php echo $linkedIn?>" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><img src="img/github.png" alt="Github" id="bio-icons"></span>
                                                </div>
                                                <input name="gitHub" type="url" class="form-control" id="github" placeholder="Github" value="<?php echo $gitHub?>" aria-describedby="basic-addon1">
                                            </div>
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
                                    <h2 id="profile-heading">PERSONAL INFORMATION</h2>
                                </div>
                                <div class="row mb-35">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="fullname" type="text" class="form-control purplemodalinput" id="fullName"
                                            placeholder="Full Name" value="<?php echo $fullname?>">
                                    </div>
                                </div>
                                <div class="row mb-35">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Current Position</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="current_pos" type="text" class="form-control purplemodalinput"
                                            id="currentPosition" placeholder="Current Position" value="<?php echo $current_pos?>">
                                    </div>
                                </div>
                                <div class="row mb-35">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" type="text" class="form-control purplemodalinput" id="email"
                                            placeholder="Email" value="<?php echo $email?>">
                                    </div>
                                </div>
                                <div class="row mb-35">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="phone_no" type="text" class="form-control purplemodalinput" id="phone"
                                            placeholder="Phone" value="<?php echo $phone?>">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 mb-35 text-secondary">
                                        <input name="address" type="text" class="form-control purplemodalinput" id="address"
                                            placeholder="No, Building No, Street Name" value="<?php echo $address?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Postal Code</h6>
                                    </div>
                                    <div class="col-sm mb-35 text-secondary">
                                        <input name="postcode" type="text" class="form-control purplemodalinput" id="code"
                                            placeholder="Postal Code" value="<?php echo $pos_code?>" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">City</h6>
                                    </div>
                                    <div class="col-sm mb-35 text-secondary">
                                        <input name="city" type="text" class="form-control purplemodalinput" id="city"
                                            placeholder="City" value="<?php echo $city?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">State</h6>
                                    </div>
                                    <div class="col-sm mb-35 text-secondary">
                                        <input name="state" type="text" class="form-control purplemodalinput" id="state"
                                            placeholder="State" value="<?php echo $state?>" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Country</h6>
                                    </div>
                                    <div class="col-sm  mb-35 text-secondary">
                                        <input name="country" type="text" class="form-control purplemodalinput" id="country"
                                            placeholder="Country" value="<?php echo $country?>" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Enrollment Year</h6>
                                    </div>
                                    <div class="col-sm mb-35 text-secondary">
                                        <input name="enrol_year" type="text" class="form-control purplemodalinput" id="enrollYear"
                                            placeholder="Year" value="<?php echo $enrol_year?>" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Graduation Year</h6>
                                    </div>
                                    <div class="col-sm text-secondary  mb-35">
                                        <input name="grad_year" type="text" class="form-control purplemodalinput" id="graduation"
                                            placeholder="Year" value="<?php echo $grad_year?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Department</h6>
                                    </div>
                                    <div class="col-sm mb-35 text-secondary">
                                        <input name="dept" type="text" class="form-control purplemodalinput" id="department"
                                            placeholder="Course" value="<?php echo $dept?>" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Level</h6>
                                    </div>
                                    <div class="col-sm mb-35 text-secondary">
                                        <input name="level" type="text" class="form-control purplemodalinput" id="level"
                                            placeholder="Degree/Master/PhD" value="<?php echo $level?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn shadow confirmbuttonModalSetting" type="button"
                                            id="cancel-button-prof" onclick="cancelEdit()">Cancel</button>
                                        <button name="editProfile" id="updatebutton" class="btn shadow" type="submit">Update Information</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php mysqli_close($conn);?>
    </main>

    <div class="modal fade" id="edit-profile-cancel-warning" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center" style="font-weight: 800;">
                    Your changes have not been saved, would you like to discard your changes?
                </div>
                <div class="modal-footer">
                    <button type="button" id="" class="btn shadow confirmbuttonModalSetting" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="" class="btn shadow confirmbuttonModalSetting" onclick="discardbutton()">Discard</button>
                    <!-- <button type="button" class="btn btn-primary btn-danger">Okay</button> -->
                </div>
            </div>
        </div>
    </div>

    <?php include_once("php/footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>
    <script>
        function loadfile(event) {
            var output = document.getElementById('photo');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
   
        function cancelEdit() {
            $('#edit-profile-cancel-warning').modal('show');
        }

        function discardbutton() {
            window.location.href = "profile.php"
        }
    </script>
</body>
</html>