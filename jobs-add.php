<?php
include_once('php/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/job.css">
    <title>Post New Job | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php");
        $alumni_id = $_GET['alumni_id'];
        ?>
 
        <main>
            <div class="container">
                <div id="post-job-main">
                    <h1 id="post-job-heading">POST NEW JOB</h1>
                    <div class="container mt-4">
                        <form enctype="multipart/form-​data" action="jobs-activity.php?alumni_id=<?php echo $alumni_id?>" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Title<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name = "job_title" type="text" class="form-control purplemodalinput" placeholder="Job Title" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Description<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm">
                                    <textarea name="job_desc" class="form-control purplemodalinput" id="description"
                                        placeholder="Job Details, Responsibilities" rows="5" required> </textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Type<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name = "job_type" class="form-select purplemodalinput" required>
                                        <option value="Full-time">Full-time</option>
                                        <option value="Part-time">Part-time</option>
                                        <option value="Internship">Internship</option>
                                        <option value="Contract">Contract</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Qualifications<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9">
                                    <textarea name="job_qual" class="form-control purplemodalinput"
                                        id="qualification" placeholder="Required Skills, Experience" cols="25" rows="3"
                                        required> </textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Salary (Monthly)<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">RM</span>
                                    <input name = "job_salary_min" type="text" class="form-control purplemodalinput" placeholder="Min" required>
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">RM</span>
                                    <input name = "job_salary_max" type="text" class="form-control purplemodalinput" placeholder="Max" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Application Deadline<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="job_dateline" type="date" class="form-control purplemodalinput">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Application Link</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="job_link" type="text" class="form-control purplemodalinput" placeholder="Provide link for job application">
                                </div>
                            </div>
                            <br><br>
                            <div class="mt-3">
                                <h3>COMPANY</h3>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="cmp_name" type="text" class="form-control purplemodalinput" placeholder="Company Name"
                                        required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Logo<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="profile-pic-div">
                                        <img src="img/icon.jpg" id="photo">
                                        <input name="cmp_logo" type="file" id="file" onchange="loadfile(event)" required>
                                        <label for="file" id="uploadBtn">Choose Photo</label>
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
                                    <input name = "cmp_size_min" type="text" class="form-control purplemodalinput" placeholder="Employee">
                                </div>
                                <div class="col-sm text-secondary">
                                    <span class="input-group-text">Max</span>
                                    <input name = "cmp_size_max" type="text" class="form-control purplemodalinput" placeholder="Employee">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">About Company<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm">
                                    <textarea name="cmp_about" class="form-control purplemodalinput" id="about"
                                        placeholder="About Company" rows="5" required></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name = "cmp_address" type="text" class="form-control purplemodalinput"
                                        placeholder="Unit Number, House Number, Building, Street Name" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Postal Code<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name = "cmp_postal" type="text" class="form-control purplemodalinput" placeholder="Postal Code"
                                        required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name = "cmp_city" type="text" class="form-control purplemodalinput" placeholder="City"
                                        required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name = "cmp_state" type="text" class="form-control purplemodalinput" placeholder="State"
                                        required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Country<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name = "cmp_country" type="text" class="form-control purplemodalinput" placeholder="Country"
                                        required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email Address<span id="red"> *</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name = "cmp_email" type="email" class="form-control purplemodalinput" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Website</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name = "cmp_website" type="text" class="form-control purplemodalinput" placeholder="www.example.com">
                                    <br><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree by all the <a href="#">Terms & Conditions</a> and <a href="#">Policy</a>
                                        </label>
                                    </div>
                                    <div class="d-flex gap-2 mt-4">
                                        <button id="editbutton" class="btn shadow" data-bs-toggle="modal" data-bs-target="#cancel" type="button">Cancel</button>
                                        <button id="updatebutton" class="btn shadow" data-bs-toggle="modal" data-bs-target="#warning" type="button">Post Job</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="warning" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body" style="text-align: center; font-weight: bold;">
                                            Are you sure you wish to post this job advertisement?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn confirmbuttonModalSetting" data-bs-dismiss="modal">Cancel</button>
                                            <button name="postJob" type="submit" class="btn confirmbuttonModalSetting">Post Job</button>
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
                                            <button type="button" class="btn confirmbuttonModalSetting">Discard Changes</button>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once("php/footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>
    <script>
        function loadfile(event) {
            var output = document.getElementById('photo');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#qualification'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>