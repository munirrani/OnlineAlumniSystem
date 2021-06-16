<?php
include_once("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php");

    if (isset($_SESSION["admin"])) {
        header("location: admindash.php");
    }

    ?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <title>Profile | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php");
        $alumni_id = $_SESSION["userid"];

        if (isset($_POST['editProfile'])) {
            $alumni_img = mysqli_real_escape_string($conn, $_POST['alumni_img']);
            /*$filename = $_FILES["alumni_img"]["name"];
            $tempname = $_FILES["alumni_img"]["tmp_name"];   
                $folder = "image/".$filename;*/
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

            $result = mysqli_query($conn, "UPDATE alumni SET BIO='$bio',LINKEDIN_ID='$linkedIn',GITHUB_ID='$gitHub',EMAIL='$email',FULL_NAME='$fullname',PHONE_NO='$phone',ADDRESS='$address',COUNTRY='$country',POSTCODE='$pos_code',CITY='$city',STATE='$state',ALUMNI_IMG='$alumni_img',ENROL_YEAR='$enrol_year',GRAD_YEAR='$grad_year',CURRENT_POS='$current_pos',LEVEL='$level',DEPT='$dept' WHERE ALUMNI_ID='$alumni_id'");
            $_SESSION["alumniimg"] = $alumni_img;
        }

        $result = mysqli_query($conn, "SELECT * FROM alumni WHERE ALUMNI_ID = $alumni_id");
        while ($res = mysqli_fetch_array($result)) {
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
                        <a id="profileNav-inactive" class="nav-link active" aria-current="page" href="profile.php">Profile</a>
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
                    <div id="round-corner-left" class="row gutters-sm shadow-lg">
                        <div class="col-md-4 mb-3">
                            <div class="card-body mt-3">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="profile-pic-div">
                                        <?php
                                        echo '<img src="img/' . $alumni_img . '" alt="Admin" id="photo" class="shadow"></a>';
                                        ?>
                                    </div>
                                    <div class="mt-3">
                                        <h2 class="profile-name" id="userName1"><?php echo $username ?></h2>
                                        <div class="container">
                                            <div class="container">
                                                <p id="bio1">
                                                    <?php
                                                    if (empty($bio)) {
                                                        echo "Add bio and social media";
                                                    } else {
                                                        echo $bio;
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="container">
                                                <a id="linkedin1" href="<?php echo $linkedIn ?>" <?php if (isset($linkedIn)) {
                                                                                                    echo 'target="_blank"';
                                                                                                } ?>><img src="img/linkedin.png" alt="LinkedIn" id="bio-icons-prof"></a>
                                                <a id="github1" href="<?php echo $gitHub ?>" <?php if (isset($gitHub)) {
                                                                                                echo 'target="_blank"';
                                                                                            } ?>><img src="img/github.png" alt="Github" id="bio-icons-prof"></a>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="container">
                                                <hr class="profileBio-line">
                                            </div>
                                        </div>
                                        <a href="profile-edit.php"><button id="editbutton" class="btn shadow" type="button" onclick="tryFunction()">Edit Profile</button></a>
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
                                        <div class="col-sm-9 text-secondary" id="fullName1">
                                            <?php echo $fullname ?>
                                        </div>
                                    </div>
                                    <div class="row mb-35">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Current Position</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary" id="currentPosition1">
                                            <?php echo $current_pos ?>
                                        </div>
                                    </div>
                                    <div class="row mb-35">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary" id="email1">
                                            <?php echo $email ?>
                                        </div>
                                    </div>
                                    <div class="row mb-35">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary" id="phone1">
                                            <?php echo $phone ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 mb-35 text-secondary" id="address1">
                                            <?php echo $address ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Postal Code</h6>
                                        </div>
                                        <div class="col-sm mb-35 text-secondary" id="code1">
                                            <?php echo $pos_code ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">City</h6>
                                        </div>
                                        <div class="col-sm mb-35 text-secondary" id="city1">
                                            <?php echo $city ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">State</h6>
                                        </div>
                                        <div class="col-sm mb-35 text-secondary" id="state1">
                                            <?php echo $state ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Country</h6>
                                        </div>
                                        <div class="col-sm text-secondary" id="country1">
                                            <?php echo $country ?>
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Enrollment Year</h6>
                                        </div>
                                        <div class="col-sm mb-35 text-secondary" id="enrollYear1">
                                            <?php echo $enrol_year ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Graduation Year</h6>
                                        </div>
                                        <div class="col-sm text-secondary  mb-35" id="graduation1">
                                            <?php echo $grad_year ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Department</h6>
                                        </div>
                                        <div class="col-sm  mb-35 text-secondary" id="department1">
                                            <?php echo $dept ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Level</h6>
                                        </div>
                                        <div class="col-sm text-secondary" id="level1">
                                            <?php echo $level ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <form action="exp-to-db.php?alumni_id=<?php echo $alumni_id ?>" method="POST">
                        <div class="row">
                            <div class="input col-md my-2">
                                <input name="companyName" type="text" class="form-control" name="comp" id="comp" placeholder="Company / Instituition" required />
                            </div>
                            <div class="input col-md my-2">
                                <input name="workTitle" type="text" class="form-control" name="activity" id="activity" placeholder="Work / Activity" required />
                            </div>
                            <div class="input col-md  my-2">
                                <input name="position" type="text" class="form-control" name="position" id="position" placeholder="Position" required />
                            </div>
                            <div class="input col-md-4 my-2">
                                <input name="description" type="text" class="form-control" name="description" id="description" placeholder="Description" required />
                            </div>
                            <div class="input col-md-auto my-2">
                                <button name="addExp" type="submit" id="updatebutton" class="btn">Add</button>
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
                            while ($res = mysqli_fetch_array($result1)) {
                                $exp_id = $res['EXPERIENCE_ID'];
                                $cmp = $res['COMPANY'];
                                $work_title = $res['WORK_TITLE'];
                                $position = $res['POSITION'];
                                $desc = $res['DESCRIPTION'];
                                echo '<tr id="table' . $exp_id . '">
                                    <td>' . $cmp . '</td>
                                    <td>' . $work_title . '</td>
                                    <td>' . $position . '</td>
                                    <td>' . $desc . '</td>
                                    <td><button onclick="deleteRow(' . $exp_id . ')" type="button" id="act-button" class="btn"><img id="search-img" class="deleteBtn" src="img/delete.png"></button></td>
                                </tr>';
                            }
                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <script>
            //delete experience row
            function deleteRow(exp_id) {
                var x = document.getElementById("table" + exp_id);

                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "profile-del-row.php?exp_id=" + exp_id + "&alumni_id=" + <?php echo $alumni_id ?>, true);
                xhttp.send();
            }
        </script>

        <?php include_once("php/footer.php") ?>
    </div>

    <?php include_once("php/scripts.php") ?>
</body>

</html>