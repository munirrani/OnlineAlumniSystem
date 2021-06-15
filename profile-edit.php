<?php
include_once("php/db_connect.php");

//kene letak edit picture dalam form
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once("php/head.php")?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <title>FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php");
        $alumni_id = 225;
        /* ini kalau page refresh tapi error klu ada input kosong
        if(isset($_POST['editBio'])){
            echo '<script>alert("Updated")</script>';
            //$alumni_img = mysqli_real_escape_string($conn, $_POST['ALUMNI_IMG']);
            $bio = mysqli_real_escape_string($conn, $_POST['bio']);
            $linkedIn = mysqli_real_escape_string($conn, $_POST['linkedIn']);
            $gitHub = mysqli_real_escape_string($conn, $_POST['gitHub']);

            $result = mysqli_query($conn, "UPDATE alumni SET BIO='$bio',GITHUB_ID='$gitHub',LINKEDIN_ID='$linkedIn' WHERE ALUMNI_ID='$alumni_id'");
        }*/

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
        mysqli_close($conn);
        ?>

        <main>
            <div class="container mt-3">
                <ul class="nav nav-tabs">
                    <li id="inactive" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link active" aria-current="page"
                            href="profile.html">Profile</a>
                    </li>
                    <li id="inactive" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="profile-settings.html">Settings & Privacy</a>
                    </li>
                    <li id="profileNav" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="jobs-activity.html">Job Activity</a>
                    </li>
                    <li id="profileNav" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="jobs-bookmark.html">Bookmarks</a>
                    </li>
                </ul>
            </div>

            <div class="container" style="margin-top: 20px;">
                <div class="main-body">
                    <div id="round-corner-left" class="row gutters-sm shadow-lg">
                        <div class="col-md-4 mb-3">
                            <div class="card-body mt-3">
                                <div class="d-flex flex-column align-items-center text-center" id="result">
                                    <div class="profile-pic-div">
                                        <img src="img/icon.jpg" id="photo">
                                        <input type="file" id="file">
                                        <label for="file" id="uploadBtn">Change Photo</label>
                                    </div>
                                    <div class="mt-3">
                                        <h2 class="profile-name" id="userName1"></h2>
                                        <div class="container">
                                            <div class="container"> 
                                                <!--<form onsubmit="updateBio()" action="profile-edit.php">-->
                                                <form>
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
                                                    <hr class="profileBio-line">
                                                    <div class="container mt-3">
                                                        <button onclick="editBio(<?php echo $alumni_id?>)" id="editbutton" class="btn shadow" type="button">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="right-col" class="col-md-8">

                            <div id="right-col" class="card mb-3">
                                <div class="card-body">
                                    <form autocomplete="off" action="profile.php" method="POST">
                                        <div class="row">
                                            <h2 id="profile-heading">PERSONAL INFORMATION</h2>
                                        </div>
                                        <div class="row mb-35">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="fullname" type="text" class="form-control purplemodalinput" id="fullName"
                                                    placeholder="Full Name" value="<?php echo $fullname?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-35">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Current Position</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="current_pos" type="text" class="form-control purplemodalinput"
                                                    id="currentPosition" placeholder="Current Position" value="<?php echo $current_pos?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-35">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="email" type="text" class="form-control purplemodalinput" id="email"
                                                    placeholder="Email" value="<?php echo $email?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-35">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="phone_no" type="text" class="form-control purplemodalinput" id="phone"
                                                    placeholder="Phone" value="<?php echo $phone?>" required>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 mb-35 text-secondary">
                                                <input name="address" type="text" class="form-control purplemodalinput" id="address"
                                                    placeholder="No, Building No, Street Name" value="<?php echo $address?>" required>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
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

    <script> 
    // ini untuk editBio tanpa refresh tapi taktau cane nak ambil linkedin & github value
        function editBio(alumni_id) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "profileBio-to-db.php?alumni_id="+alumni_id, true);
            xhttp.send();
            alert("Updated!");
        }

        function cancelEdit() {
            $('#edit-profile-cancel-warning').modal('show');
        }

        function discardbutton() {
            window.location.href = "profile.html"
        }

        function updateBio() {
            var a = document.getElementById("bio").value;
            sessionStorage.setItem("bio", a);
            var b = document.getElementById("linkedin").value;
            sessionStorage.setItem("linkedin", b);
            var c = document.getElementById("github").value;
            sessionStorage.setItem("github", c);
            alert("Updated")
        }

        // Upload Photo
        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');

        document.querySelector("#file").addEventListener("change", window.onload = function () {
            const reader = new FileReader();

            reader.addEventListener('load', () => {
                sessionStorage.setItem("image", reader.result);
            });

            reader.readAsDataURL(this.files[0]);

            window.location.reload();
        });

        document.addEventListener("DOMContentLoaded", () => {
            const recentImageDataUrl = sessionStorage.getItem("image");

            if (recentImageDataUrl) {
                document.querySelector("#photo").setAttribute("src", recentImageDataUrl);
            }
        });
    </script>

    <footer class="page-footer shadow">
        <div class="container text-center text-md-left mt-4">
            <div class="row align-items-center">
                <div class="col-md-4 mx-auto mb-4">
                    <a href="index.html">
                        <img src="img/FCSIT Logo New.png" alt="" height="70%" width="70%" class="img-fluid">
                    </a>
                    <br>
                    <br>
                    <br>
                    <p class="h5 lh-5" style="text-align: justify;">Formed in 1965, the Faculty of Computer Science
                        & Information Technology made the university one of the pioneers in computer usage in
                        Malaysia. Since its establishment, the Faculty of Computer Science and Information
                        Technology
                        has been led by a number of distinguished persons.</p>
                </div>

                <div class="col-md-3 mx-auto mb-4">
                    <h2 class="text-uppercase">Links</h2>
                    <br>
                    <h5>
                        <ul class="list-unstyled lh-5 footer-link">
                            <li class="my-2 pt-2">
                                <a href="about.html" class="text-dark">About</a>
                            </li>
                            <li class="my-2 pt-2">
                                <a href="contact.html" class="text-dark">Contact Us</a>
                            </li>
                            <li class="my-2 pt-2">
                                <a href="events.html" class="text-dark">Upcoming Events</a>
                            </li>
                            <li class="my-2 pt-2">
                                <a href="jobs.html" class="text-dark">Search Jobs</a>
                            </li>
                        </ul>
                    </h5>
                </div>

                <div class="col-md-4 mx-auto mb-4">
                    <h2 class="text-uppercase">Location</h2>
                    <div class="d-flex justify-content-center">
                        <div id="map"></div>
                    </div>
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVtr5sUBYuVy6QWlxdX19VRvP8dX9INUI&callback=initMap&libraries=&v=weekly"
                        async></script>
                    <br>
                    <p class="h5 lh-5" style="text-align: justify;">University of Malaya, 50603 Kuala Lumpur,
                        Federal Territory of Kuala Lumpur, Malaysia
                    </p>
                </div>
            </div>
        </div>

        <div class="footer-copyright text-center py-3" style="background-color: #8f0b89; color: white;">
            <p>Copyright &copy; FSKTM 2021
            </p>
        </div>
    </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>