<?php
include_once("php/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/job.css">
    <title>Job Activity | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php 
        include_once("php/heading.php");
        $alumni_id = $_SESSION["userid"];
        ?> 

        <main>
            <div class="container mt-3">
                <ul class="nav nav-tabs">
                    <li id="inactive" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li id="inactive" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="profile-settings.php">Settings & Privacy</a>
                    </li>
                    <li id="profileNav" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link active" aria-current="page"
                            href="jobs-activity.php">Job Activity</a>
                    </li>
                    <li id="profileNav" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="jobs-bookmark.php">Bookmarks</a>
                    </li>
                </ul>
            </div>

            <?php
            $result2 = mysqli_query($conn, "SELECT * FROM job WHERE ALUMNI_ID = $alumni_id");
            $post_count = mysqli_num_rows($result2);

            $result = mysqli_query($conn, "SELECT * FROM alumni WHERE ALUMNI_ID = $alumni_id");
            while($res = mysqli_fetch_array($result)){
                $username = $res['USERNAME'];
                $alumni_img = $res['ALUMNI_IMG'];
            }
            ?>

            <div class="container" style="margin-top: 20px;">
                <div class="main-body">
                    <div id="act-header" class="shadow-lg">
                        <div class="row">
                            <div class="col-md-auto">
                                <a href="profile.php">
                                <?php
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($alumni_img) . '" alt="Admin" id="act-profileImg" class="shadow"></a>';
                                ?>
                            </div>
                            <div class="col-md-8">
                                <h2 class="profile-name" style="margin-bottom: 0px; padding-top: 20px;" id="userName1"><?php echo $username?></h2>
                                <p id="bio1" style="margin-top: 0px;">Software Engineering</p>
                            </div>
                            <div class="col-md">
                                <h2 id="act-count"><?php echo $post_count?></h2>
                                <p id="act-uploads">Job Uploads</p>
                            </div>
                        </div>
                    </div>
                    <div id="act-main" class="card mb-3">
                        <div class="card-body">
                            <div class="row" id="act-addbox"><a href="jobs-add.php?alumni_id=<?php echo $alumni_id?>" style="text-decoration: none;">
                                    <img src="img/add.png" id="act-addimg">
                                    <h6 id="act-txtadd">
                                        Add a new job vacancy
                                    </h6>
                                </a>
                            </div>
                            <hr>
                            <div class="row">
                                <h2 id="act-txtheading">JOB ACTIVITY</h2>
                            </div>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM job WHERE ALUMNI_ID = $alumni_id ORDER BY EDIT_DATE DESC");
                            while($res = mysqli_fetch_array($result)){
                                $job_id = $res['JOB_ID'];
                                $job_title = $res['JOB_TITLE'];
                                $cmp_logo = $res['CMP_LOGO'];
                                $cmp_name = $res['CMP_NAME'];
                                $job_salary_min = $res['JOB_SALARY_MIN'];
                                $job_salary_max = $res['JOB_SALARY_MAX'];
                                $post_date = $res['POST_DATE'];
                                $job_salary = "RM".$job_salary_min." - RM".$job_salary_max;
                                $cmp_state = $res['CMP_STATE'];
                                $new_post_date = date("j F Y",strtotime($post_date));
                                echo '
                                <div id="div'.$job_id.'">
                                    <div>
                                        Posted on '.$new_post_date.'
                                    </div>
                                    <div id="act-box" class="row">
                                        <div class="col-md-4">
                                            <a href="jobs-details.php?job_id='.$job_id.'"><img src="img/'.$cmp_logo.'" class="act-image"></a>
                                            <a href="jobs-details.php?job_id='.$job_id.'" id="no-blue"><h6 id="act-jobname">
                                                '.$job_title.'
                                            </h6></a>
                                            <h6 id="job-company">
                                            '.$cmp_name.'
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6 id="act-salary">
                                                '.$job_salary.'
                                            </h6>
                                        </div>
                                        <div class="col-md">
                                            <h6 id="act-location">
                                            '.$cmp_state.'
                                            </h6>
                                        </div>
                                        <div class="col-md-auto">
                                            <button type="button" id="act-button" class="btn" data-bs-toggle="modal" data-bs-target="#warning"><img id="search-img" src="img/delete.png"></button>
                                            <a href="jobs-edit.php?job_id='.$job_id.'"><button type="button" id="act-button" class="btn"><img id="search-img" src="img/edit.png"></button></a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="modal fade" id="warning" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body" style="text-align: center; font-weight: bold">
                                                You\'re about to delete this job advertisement. <br>Are you sure?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn confirmbuttonModalSetting" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" onclick="deleteBookmark('.$job_id.')" data-bs-dismiss="modal" class="btn confirmbuttonModalSetting">Delete Job</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>'
                                ;
                            }
                            mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                </div>
        </main>
        <script>
            //delete job
            function deleteBookmark(job_id) {
            var x = document.getElementById("div"+job_id);
            if (x.style.display === "none") {
                x.style.display = "block"; 
            } 
            else {
                x.style.display = "none";
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("act-count").innerHTML = this.responseText;
            }
            xhttp.open("GET", "php/job-ajax.php?do=delP&job_id="+job_id+"&alumni_id="+<?php echo $alumni_id?>, true);
            xhttp.send();
            }
            
        </script>

        <?php include_once("php/footer.php")?>  
    </div>

    <?php include_once("php/scripts.php")?>
    <script type="text/javascript" src="js/defaultProfile.js"></script>
</body>
</html>