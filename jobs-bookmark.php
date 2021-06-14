<?php
include_once("php/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/job.css">
    <title>Bookmark | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php");
        $alumni_id = 5;
        ?> 

        <main>
            <div class="container mt-3">
                <ul class="nav nav-tabs">
                    <li id="inactive" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="profile.html">Profile</a>
                    </li>
                    <li id="inactive" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="profile-settings.html">Settings & Privacy</a>
                    </li>
                    <li id="profileNav" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link" href="jobs-activity.php">Job Activity</a>
                    </li>
                    <li id="profileNav" class="nav-item">
                        <a id="profileNav-inactive" class="nav-link  active" aria-current="page"
                            href="jobs-bookmark.html">Bookmarks</a>
                    </li>
                </ul>
            </div>

            <?php
            $book_count = 0;
            $result = mysqli_query($conn, "SELECT * FROM bookmark WHERE ALUMNI_ID = $alumni_id");
            while($res = mysqli_fetch_array($result)){
                $book_count++;
            }
            ?>

            <div class="container" style="margin-top: 20px;">
                <div class="main-body">
                    <div id="act-header" class="shadow-lg">
                        <div class="row">
                            <div class="col-md-auto">
                                <a href="profile.html"><img src="img/icon.jpg" alt="Admin" id="act-profileImg"
                                        class="shadow"></a>
                            </div>
                            <div class="col-md-8">
                                <h2 class="profile-name" style="margin-bottom: 0px; padding-top: 20px;" id="userName1">
                                </h2>
                                <p id="bio1" style="margin-top: 0px;">Software Engineering</p>
                            </div>
                            <div class="col-md">
                                <h2 id="act-count"><?php echo $book_count?></h2>
                                <p id="act-uploads">Bookmarks</p>
                            </div>
                        </div>
                    </div>
                    <div id="act-main" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <h2 id="act-txtheading">BOOKMARKS</h2>
                            </div>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM bookmark WHERE ALUMNI_ID = $alumni_id");
                            while($res = mysqli_fetch_array($result)){
                                $job_id = $res['JOB_ID'];
                                $book_date = $res['BOOK_DATE'];
                                $result2 = mysqli_query($conn, "SELECT * FROM job WHERE JOB_ID = $job_id");
                                
                                while($res2 = mysqli_fetch_array($result2)){
                                    $job_title = $res2['JOB_TITLE'];
                                    $cmp_logo = $res2['CMP_LOGO'];
                                    $cmp_name = $res2['CMP_NAME'];
                                    $job_salary_min = $res2['JOB_SALARY_MIN'];
                                    $job_salary_max = $res2['JOB_SALARY_MAX'];
                                    $job_salary = "RM".$job_salary_min." - RM".$job_salary_max;
                                    $cmp_state = $res2['CMP_STATE'];
                                    $new_book_date = date("j F Y",strtotime($book_date));
                                    echo '
                                    <div id="div'.$job_id.'">
                                        <div id="act-posted">
                                            Bookmarked on '.$new_book_date.'
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
                                                <button type="button" id="act-button" class="btn"onclick="deleteBookmark('.$job_id.')"><img id="search-img" src="img/delete.png"></button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>';
                                }
                            }
                            mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-sm" id="dialogModal" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body" style="text-align: center;">
                                Bookmark removed!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            //delete bookmark
            function deleteBookmark(job_id) {
            var x = document.getElementById("div"+job_id);
            
            if (x.style.display === "none") {
                x.style.display = "block"; 
            } 
            else {
                x.style.display = "none";
            }
            }
            //modal
            setTimeout(function(){
                $('#dialogModal').modal('hide')
            }, 1000);
            //profile
            document.getElementById("userName1").innerHTML = sessionStorage.getItem("userName");
            document.querySelector("#act-profileImg").src = sessionStorage.getItem("image");
            document.querySelector("#act-profileImg").classList.add("imgcoverobject");
        </script>
        <?php include_once("php/footer.php")?>  
    </div>
    <?php include_once("php/scripts.php")?>
    <script type="text/javascript" src="js/defaultProfile.js"></script>
</body>
</html>