<?php
include_once("php/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <?PHP

    if (!isset($_SESSION["admin"]) || !isset($_SESSION["userid"])) {
        header("location: index.php");
    }

    ?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <title>FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
    <?php include_once("php/admin_heading.php");
    
        $alumni_id = $_GET["alumni_id"];
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
        <div id="home-container" class="container-fluid">
            <div class="container mb-3">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb-background">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-admin"> <a href="admindash.php">Admin-Dashboard</a></li>
                        <li class="breadcrumb-item breadcrumb-admin"> <a href="admin-profile-dash.php">Profiles Dashboard</a></li>
                        <li class="breadcrumb-item breadcrumb-admin"> <a href="admin-approved-alumni.php">Approved Profiles</a></li>
                        <li class="breadcrumb-item breadcrumb-admin-current active" aria-current="page">/Edit Profiles</li>
                    </ol>
                </nav>
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
                                            <button name="editProfile" id="updatebutton" value="<?php echo $alumni_id?>" class="btn shadow" type="submit">Update Information</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container mt-4 shadow-lg" id="bottom-box">
            <button type="button" class="collapsible mb-0" id="exp">
                <div class="row mt-4">
                    <div class="col-md-1">
                        <img src="img/add.png" id="act-addimg">
                    </div>
                    <div class="col-md">
                        <h2 class="mb-0" id="profile-heading">EXPERIENCE</h2>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
            </button>
            
            <div class="content" id="exp">
                <form action="exp-to-db.php?alumni_id=<?php echo $alumni_id?>" method="POST">
                    <div class="row">
                        <div class="input col-md my-2">
                            <input name="companyName" type="text" class="form-control" name="comp" id="comp" placeholder="Company / Instituition" required/>
                        </div>
                        <div class="input col-md my-2">
                            <input name="workTitle" type="text" class="form-control" name="activity" id="activity" placeholder="Work / Activity" required/>
                        </div>
                        <div class="input col-md  my-2">
                            <input name="position" type="text" class="form-control" name="position" id="position" placeholder="Position" required/>
                        </div>
                        <div class="input col-md-4 my-2">
                            <input name="description" type="text" class="form-control" name="description" id="description" placeholder="Description" required/>
                        </div>
                        <div class="input col-md-auto my-2">
                            <button name="addExp" id="updatebutton" class="btn">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive-md">
                <table class="table content-table">
                    <colgroup>
                        <col span="1" style="width: 20%;">
                        <col span="1" style="width: 20%;">
                        <col span="1" style="width: 21%;">
                        <col span="1" style="width: 31%;">
                        <col span="1" style="width: 8%;">
                        </colgroup>
                    <thead>
                        <tr>
                        <th>Company / Instituition</th>
                        <th>Work / Activity</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result1 = mysqli_query($conn, "SELECT * FROM experience WHERE ALUMNI_ID = $alumni_id");
                        while($res = mysqli_fetch_array($result1)){
                            $exp_id = $res['EXPERIENCE_ID'];
                            $cmp = $res['COMPANY'];
                            $work_title = $res['WORK_TITLE'];
                            $position = $res['POSITION'];
                            $desc = $res['DESCRIPTION'];
                            echo '<tr id="table'.$exp_id.'">
                                <td>'.$cmp.'</td>
                                <td>'.$work_title.'</td>
                                <td>'.$position.'</td>
                                <td>'.$desc.'</td>
                                <td><button type="button" id="act-button" class="btn" data-bs-toggle="modal" data-bs-target="#warning"><img id="search-img" class="deleteBtn" src="img/delete.png"></button></td>
                                </tr>
                                <div class="modal fade" id="warning" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body" style="text-align: center; font-weight: bold">
                                            You\'re about to delete this experience. <br>Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn confirmbuttonModalSetting" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" onclick="deleteRow('.$exp_id.')" data-bs-dismiss="modal" class="btn confirmbuttonModalSetting">Delete Experience</button>
                                        </div>
                                    </div>
                                </div>';
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php mysqli_close($conn);?>
    </main>

    <script>
        //delete experience row
        function deleteRow(exp_id) {
            var x = document.getElementById("table"+exp_id);
            
            if (x.style.display === "none") {
                x.style.display = "block"; 
            } 
            else {
                x.style.display = "none";
            }
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "profile-ajax.php?do=delRow&exp_id="+exp_id+"&alumni_id="+<?php echo $alumni_id?>, true);
            xhttp.send();
            }
    </script>

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
            window.location.href = "admin-approved-alumni.php"
        }
    </script>
</body>
</html>