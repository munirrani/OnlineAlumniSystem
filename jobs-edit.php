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
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/job.css">
    <title>Edit Job | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php");

        $job_id = $_GET['job_id'];
        $result = mysqli_query($conn, "SELECT * FROM job WHERE JOB_ID = $job_id");

        while ($res = mysqli_fetch_array($result)) {
            $job_title = $res['JOB_TITLE'];
            $job_desc = $res['JOB_DESCRIPTION'];
            $job_type = $res['JOB_TYPE'];
            $job_qual = $res['JOB_QUALIFICATION'];
            $job_salary_min = $res['JOB_SALARY_MIN'];
            $job_salary_max = $res['JOB_SALARY_MAX'];
            $job_dateline = $res['JOB_DATELINE'];
            $job_link = $res['JOB_LINK'];
            $cmp_name = $res['CMP_NAME'];
            $cmp_about = $res['CMP_ABOUT'];
            $cmp_logo = $res['CMP_LOGO'];
            $cmp_address = $res['CMP_ADDRESS'];
            $cmp_postal = $res['CMP_POSTAL'];
            $cmp_city = $res['CMP_CITY'];
            $cmp_state = $res['CMP_STATE'];
            $cmp_country = $res['CMP_COUNTRY'];
            $cmp_size_min = $res['CMP_SIZE_MIN'];
            $cmp_size_max = $res['CMP_SIZE_MAX'];
            $cmp_email = $res['CMP_EMAIL'];
            $cmp_website = $res['CMP_WEBSITE'];
        }
        mysqli_close($conn);
        ?> 
        <main>
            <div class="container">
                <div id="post-job-main">
                    <h1 id="post-job-heading">EDIT JOB</h1>
                    <div class="container-fluid mt-4">
                    <form enctype="multipart/form-​data" action="php/job-to-db.php?job_id=<?php echo $job_id;?>" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Title<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="job_title" type="text" class="form-control purplemodalinput" placeholder="Job Title" value="<?php echo $job_title ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Description<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm">
                                    <textarea name="job_desc" class="form-control purplemodalinput" id="description"
                                        placeholder="Job Details, Responsibilities" rows="5" required><?php echo $job_desc?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Type<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="job_type" class="form-select purplemodalinput" required>
                                        <?php
                                        if ($job_type == "Full-time") {
                                            echo '<option value="Full-time" selected>Full-time</option>
                                                  <option value="Part-time">Part-time</option>
                                                  <option value="Internship">Internship</option>
                                                  <option value="Contract">Contract</option>';
                                        } else if (($job_type == "Part-time")) {
                                            echo '<option value="Full-time">Full-time</option>
                                                  <option value="Part-time" selected>Part-time</option>
                                                  <option value="Internship">Internship</option>
                                                  <option value="Contract">Contract</option>';
                                        } else if (($job_type == "Internship")) {
                                            echo '<option value="Full-time">Full-time</option>
                                                  <option value="Part-time">Part-time</option>
                                                  <option value="Internship" selected>Internship</option>
                                                  <option value="Contract">Contract</option>';
                                        } else {
                                            echo '<option value="Contract">Full-time</option>
                                                  <option value="Part-time">Part-time</option>
                                                  <option value="Internship">Internship</option>
                                                  <option value="Contract" selected>Contract</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Qualifications<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9">
<<<<<<< HEAD
                                    <textarea name="job_qual" class="form-control purplemodalinput"
                                        id="qualification" placeholder="Required Skills, Experience" cols="25" rows="3"
                                        required><?php echo $job_qual?></textarea>
=======
                                    <textarea name="job_qual" class="form-control purplemodalinput" id="qualification1" placeholder="Required Skills, Experience" cols="25" rows="3" required><?php echo $job_qual ?></textarea>
>>>>>>> c97a41a81e3e39d67be07e501ce802aab2d60e34
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Salary (Monthly)<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">RM</span>
<<<<<<< HEAD
                                    <input id="minS" name = "job_salary_min" type="text" class="form-control purplemodalinput" placeholder="Min" value="<?php echo $job_salary_min?>" required>
                                    <p style="color:red" id="salarytxt"></p>
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">RM</span>
                                    <input id="maxS" name = "job_salary_max" type="text" class="form-control purplemodalinput" placeholder="Max" value="<?php echo $job_salary_max?>" required>
=======
                                    <input name="job_salary_min" type="text" class="form-control purplemodalinput" placeholder="Min" value="<?php echo $job_salary_min ?>" required>
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">RM</span>
                                    <input name="job_salary_max" type="text" class="form-control purplemodalinput" placeholder="Max" value="<?php echo $job_salary_max ?>" required>
>>>>>>> c97a41a81e3e39d67be07e501ce802aab2d60e34
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Application Deadline<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
<<<<<<< HEAD
                                    <input id="dateline" name="job_dateline" type="date" value="<?php echo $job_dateline?>" class="form-control purplemodalinput">
                                    <p style="color:red" id="datelinetxt"></p>
=======
                                    <input name="job_dateline" type="date" value="<?php echo $job_dateline ?>" class="form-control purplemodalinput">
>>>>>>> c97a41a81e3e39d67be07e501ce802aab2d60e34
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Application Link</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="job_link" type="text" class="form-control purplemodalinput" value="<?php echo $job_link ?>" placeholder="Provide link for job application">
                                </div>
                            </div>
                            <br><br>
                            <div class="mt-3">
                                <h3>COMPANY</h3>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company<span id="red">*</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_name" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_name ?>" placeholder="Company Name" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Logo<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm text-secondary">
                                    <div class="profile-pic-div">
                                        <img src="img/<?php echo $cmp_logo ?>" id="photo">
                                        <input name="cmp_logo" type="file" id="file" onchange="loadfile(event)">
                                        <label for="file" id="uploadBtn">Change Photo</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Size</h6>
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">Min</span>
<<<<<<< HEAD
                                    <input id="minC" name = "cmp_size_min" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_size_min?>" placeholder="Employee">
                                    <p style="color:red" id="cmpSizetxt"></p>
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">Max</span>
                                    <input id="maxC" name = "cmp_size_max" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_size_max?>" placeholder="Employee">
=======
                                    <input name="cmp_size_min" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_size_min ?>" placeholder="Employee">
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">Max</span>
                                    <input name="cmp_size_max" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_size_max ?>" placeholder="Employee">
>>>>>>> c97a41a81e3e39d67be07e501ce802aab2d60e34
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">About Company<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm">
                                    <textarea name="cmp_about" class="form-control purplemodalinput" id="about" placeholder="About Company" rows="5" required><?php echo $cmp_about ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_address" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_address ?>" placeholder="Unit Number, House Number, Building, Street Name" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Postal Code<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_postal" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_postal ?>" placeholder="Postal Code" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_city" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_city ?>" placeholder="City" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_state" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_state ?>" placeholder="State" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Country<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_country" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_country ?>" placeholder="Country" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email Address<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_email" type="email" class="form-control purplemodalinput" id="exampleFormControlInput1" value="<?php echo $cmp_email ?>" placeholder="name@example.com">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Website</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_website" type="text" class="form-control purplemodalinput" value="<?php echo $cmp_website ?>" placeholder="www.example.com">
                                    <br><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree by all the <a href="#">Terms & Conditions</a> and <a href="#">Policy</a>
                                        </label>
                                    </div>
                                    <div class="d-flex gap-2 mt-4">
                                        <button id="editbutton" class="btn shadow" data-bs-toggle="modal" data-bs-target="#cancel" type="button">Cancel</button>
                                        <button id="updatebutton" class="btn shadow" type="button" onclick="validateForm()">Edit Job</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="warning" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body" style="text-align: center; font-weight: bold">
                                            Are you sure you wish to edit this job advertisement?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn confirmbuttonModalSetting" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="editJob" class="btn confirmbuttonModalSetting">Edit Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body" style="text-align: center; font-weight: bold">
                                            All changes made will be discarded. <br>Do you wish to continue?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn confirmbuttonModalSetting" data-bs-dismiss="modal">Cancel</button>
                                            <a href="jobs-activity.php"><button type="button" class="btn confirmbuttonModalSetting">Discard Changes</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once("php/footer.php") ?>
    </div>

<<<<<<< HEAD
    <?php include_once("php/scripts.php")?>
    
    <script type="text/javascript" src="js/jobs-validate.js"></script>
=======
    <?php include_once("php/scripts.php") ?>
    <script>
        function loadfile(event) {
            var output = document.getElementById('photo');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#qualification1'))
            .catch(error => {
                console.error(error);
            });
    </script>
>>>>>>> c97a41a81e3e39d67be07e501ce802aab2d60e34
</body>

</html>