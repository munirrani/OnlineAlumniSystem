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
    <link rel="stylesheet" href="css/job.css">
    <title>FSKTM Alumni</title>
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
        ?>

        <main>
            <div class="container mt-3">
                <div class="main-body">
                    <div class="row gutters=sm">
                        <div class="col-md-3">
                            <div class="shadow-lg" id="details-left-col-body">
                                <div class="d-flex flex-column align-items-center text-center" id="details-left-col-img">
                                    <img src="img/<?php echo $cmp_logo ?>" id="details-image">
                                    <br>
                                    <h5 class="det-strong"><?php echo $cmp_name ?></h5>
                                </div>
                                <hr>
                                <div class="pd-20">
                                    <div>
                                        <img src="img/location.png" id="details-left-col-icons">
                                        <div class="no-text-wrap">
                                            <h6 class="det-strong"><?php echo $cmp_city . ", " . $cmp_state ?></h6>
                                            <p id="details-small"><?php echo $cmp_address . ", " . $cmp_postal . ", " . $cmp_state . ", " . $cmp_country ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="img/people.png" id="details-left-col-icons">
                                        <div class="no-text-wrap">
                                            <h6 class="det-strong"><?php echo $cmp_size_min . ' - ' . $cmp_size_max ?></h6>
                                            <p id="details-small">Employee</p>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="img/email.png" id="details-left-col-icons">
                                        <div class="no-text-wrap">
                                            <h6 class="det-strong">Email</h6>
                                            <a href="mailto:<?php echo $cmp_email ?>" id="details-link">
                                                <p id="details-small"><?php echo $cmp_email ?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="img/website.png" id="details-left-col-icons">
                                        <div class="no-text-wrap">
                                            <h6 class="det-strong">Website</h6>
                                            <?php
                                            if (empty($cmp_website)) {
                                                echo '
                                                <p class="mb-0" id="details-small">-</p>';
                                            } else {
                                                echo '<a href="' . $cmp_website . '" id="details-link">
                                                      <p  class="mb-0" id="details-small">' . $cmp_website . '</p>';
                                            }
                                            ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="pd-20">
                                    <h6>About Company</h6>
                                    <p style="text-align: justify; line-height: 1.6" id="details-small"><?php echo $cmp_about ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $result2 = mysqli_query($conn, "SELECT job.*, alumni.USERNAME FROM job INNER JOIN alumni ON job.ALUMNI_ID = alumni.ALUMNI_ID");
                        while($res2 = mysqli_fetch_array($result2)){
                            $alumni_id = $res2['ALUMNI_ID'];
                            $post_date = $res2['POST_DATE'];
                            $edit_date = $res2['EDIT_DATE'];
                            $username = $res2['USERNAME'];

                            $new_post_date = date("j F Y", strtotime($post_date));
                            $new_edit_date = date("j F Y", strtotime($edit_date));
                            $new_job_dateline = date("j F Y", strtotime($job_dateline));
                        }
                        ?>
                        <div class="col-md-9">
                            <div id="details-right-col-body" class="card mb-3">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                            <h1><?php echo $job_title?></h1>
                                            <h6 id="details-small"><?php echo "Posted by ".$username." on ".$new_post_date?></h6>
                                            <?php
                                            if ($post_date != $edit_date) {
                                                echo '<h6 id="details-small">Recently edited on ' . $new_edit_date . '</h6>';
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                            if (empty($job_link)) {
                                                if (empty($cmp_website)) {
                                                } else {
                                                    echo '<a href=' . $cmp_website . '><button type="button" id="viewbutton" class="btn">Apply</button></a>';
                                                }
                                            } else {
                                                echo '<a href=' . $job_link . '><button type="button" id="viewbutton" class="btn">Apply</button></a>';
                                            }
                                            ?>
                                            <button type="button" id="job-bmark" class="btn bmark-hide-logged"><img id="search-img" src="img/bookmark-icon.png"></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pl-5 py-3">
                                            <img src="img/RM.png" id="details-right-col-icon">
                                            <div class="no-text-wrap">
                                                <h6 class="det-strong"><?php echo "RM" . $job_salary_min . " - RM" . $job_salary_max ?></h6>
                                                <h6 id="details-small">Monthly salary</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-5 py-3">
                                            <img src="img/job.png" id="details-right-col-icon">
                                            <h6 class="det-strong"><?php echo $job_type ?></h6>
                                            <h6 id="details-small">Job type</h6>
                                        </div>
                                        <div class="col-md-4 pl-5 py-3">
                                            <img src="img/dateline.png" id="details-right-col-icon">
                                            <div>
                                                <h6 class="det-strong"><?php echo $new_job_dateline ?></h6>
                                                <h6 id="details-small">Application dateline</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h5 class="mb-3">Job Description</h5>
                                        <div><?php echo $job_desc ?></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h5 class="mb-3">Qualifications</h5>
                                        <div><?php echo $job_qual ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once("php/footer.php") ?>
    </div>

    <?php include_once("php/scripts.php") ?>
</body>

</html>