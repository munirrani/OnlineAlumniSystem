<?php
include_once("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <title>Profile | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php");
        $alumni_id = 225;

        if(isset($_POST['editProfile'])){
            $alumni_img = mysqli_real_escape_string($conn, $_POST['alumni_img']);
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
        }

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
                    <div id="round-corner-left" class="row gutters-sm shadow-lg">
                        <div class="col-md-4 mb-3">
                            <div class="card-body mt-3">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <?php
                                    if(empty($alumni_img)){
                                        echo '<img src="img/icon.jpg" alt="Admin" id="profileImg" class="shadow">';
                                        
                                    }
                                    else{
                                        echo '<img src="img/'.$alumni_img.'" alt="Admin" id="profileImg" class="shadow">';
                                    }
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
                                                <a id="linkedin1" href="<?php echo $linkedIn?>" <?php if(isset($linkedIn)){echo 'target="_blank"';}?>><img src="img/linkedin.png" alt="LinkedIn" id="bio-icons-prof"></a>
                                                <a id="github1" href="<?php echo $gitHub?>" <?php if(isset($gitHub)){echo 'target="_blank"';}?>><img src="img/github.png" alt="Github" id="bio-icons-prof"></a>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="container">
                                                <hr class="profileBio-line">
                                            </div>
                                        </div>
                                        <a href="profile-edit.php"><button id="editbutton" class="btn shadow"
                                                type="button" onclick="tryFunction()">Edit Profile</button></a>
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
                                        <?php echo $fullname?>
                                        </div>
                                    </div>
                                    <div class="row mb-35">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Current Position</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary" id="currentPosition1">
                                        <?php echo $current_pos?>
                                        </div>
                                    </div>
                                    <div class="row mb-35">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary" id="email1">
                                        <?php echo $email?>
                                        </div>
                                    </div>
                                    <div class="row mb-35">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary" id="phone1">
                                        <?php echo $phone?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 mb-35 text-secondary" id="address1">
                                        <?php echo $address?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Postal Code</h6>
                                        </div>
                                        <div class="col-sm mb-35 text-secondary" id="code1">
                                        <?php echo $pos_code?>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">City</h6>
                                        </div>
                                        <div class="col-sm mb-35 text-secondary" id="city1">
                                        <?php echo $city?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">State</h6>
                                        </div>
                                        <div class="col-sm mb-35 text-secondary" id="state1">
                                        <?php echo $state?>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Country</h6>
                                        </div>
                                        <div class="col-sm text-secondary" id="country1">
                                        <?php echo $country?>
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Enrollment Year</h6>
                                        </div>
                                        <div class="col-sm mb-35 text-secondary" id="enrollYear1">
                                        <?php echo $enrol_year?>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Graduation Year</h6>
                                        </div>
                                        <div class="col-sm text-secondary  mb-35" id="graduation1">
                                        <?php echo $grad_year?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Department</h6>
                                        </div>
                                        <div class="col-sm  mb-35 text-secondary" id="department1">
                                        <?php echo $dept?>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Level</h6>
                                        </div>
                                        <div class="col-sm text-secondary" id="level1">
                                        <?php echo $level?>
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
                    <form>
                        <div class="row">
                            <div class="input col-md my-2">
                                <input type="text" class="form-control" name="comp" id="comp" placeholder="Company / Instituition" required/>
                            </div>
                            <div class="input col-md my-2">
                                <input type="text" class="form-control" name="activity" id="activity" placeholder="Work / Activity" required/>
                            </div>
                            <div class="input col-md  my-2">
                                <input type="text" class="form-control" name="position" id="position" placeholder="Position" required/>
                            </div>
                            <div class="input col-md-4 my-2">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Description" required/>
                            </div>
                            <div class="input col-md-auto my-2">
                                <button type="submit" id="updatebutton" class="btn">Add</button>
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
                            <tr>
                                <td>University Malaya</td>
                                <td>FSKTM MyTech Career Fair 2021</td>
                                <td>Head of Technical Bureau</td>
                                <td>Leading a 5-person team in handling the technical aspects of the MyTech
                                    Career Fair and responsible for handling the platform for hosting the
                                    event.</td>
                                <td><button type="button" id="act-button" class="btn"><img id="search-img" class="deleteBtn" src="img/delete.png"></button></td>
                            </tr>
                            <tr>
                                <td>University Malaya</td>
                                <td>PEKOM</td>
                                <td>EXCO Software Engineering</td>
                                <td>Provide constructive opinions on how to improve students' academic experience.</td>
                                <td><button type="button" id="act-button" class="btn"><img id="search-img" class="deleteBtn" src="img/delete.png"></button></td>
                            </tr>
                            <tr>
                                <td>SWIFT</td>
                                <td>Software Developer</td>
                                <td>Part-time employee</td>
                                <td>Work for 1 year and learned new skills.</td>
                                <td><button type="button" id="act-button" class="btn"><img id="search-img" class="deleteBtn" src="img/delete.png"></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <script>
        const formEl = document.querySelector("form");
        const tbodyEl = document.querySelector("tbody");
        const tableEl = document.querySelector("table");
        function onAddWebsite(e) {
            e.preventDefault();
            const company = document.getElementById("comp").value;
            const activity = document.getElementById("activity").value;
            const position = document.getElementById("position").value;
            const description= document.getElementById("description").value;
            tbodyEl.innerHTML += `
                <tr>
                <td>${company}</td>
                <td>${activity}</td>
                <td>${position}</td>
                <td>${description}</td>
                <td><button type="button" id="act-button" class="btn"><img id="search-img" class="deleteBtn" src="img/delete.png"></button></td>
                </tr>
            `;
        }
        function onDeleteRow(e) {
            if (!e.target.classList.contains("deleteBtn")) {
            return;
            }
            const btn = e.target;
            btn.closest("tr").remove();
        }
        formEl.addEventListener("submit", onAddWebsite);
        tableEl.addEventListener("click", onDeleteRow);
                
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